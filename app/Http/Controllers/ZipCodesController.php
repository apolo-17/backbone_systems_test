<?php

namespace App\Http\Controllers;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZipCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadZipCodes(Request $request)
    {
        DB::beginTransaction();
        try {
            $lines = file($request->csv_file);
            $utf8_lines_decode = array_map('utf8_encode', $lines);

            $array_csv = array_map('str_getcsv', $utf8_lines_decode);

            for ($i = 1; $i < sizeof($array_csv); $i++) {
                $zip_code_ = $array_csv[$i][0];
                $locality = $array_csv[$i][5];

                $federal_entity_key = $array_csv[$i][7];
                $federal_entity_name = $array_csv[$i][4];

                $settlement_key = $array_csv[$i][12];
                $settlement_name = $array_csv[$i][1];
                $settlement_zone_type = $array_csv[$i][13];

                $settlement_type_name = $array_csv[$i][2];

                $municipality_key = $array_csv[$i][11];
                $municipality_name = $array_csv[$i][3];

                $zip_code = ZipCode::firstOrCreate(['zip_code' => $array_csv[$i][0]], ['locality' => $array_csv[$i][5]]);

                $settlement_type = SettlementType::firstOrCreate(['name' => $settlement_type_name]);

                Settlement::create([
                    'key' => intval($settlement_key),
                    'name' => $settlement_name,
                    'zone_type' => $settlement_zone_type,
                    'zip_code_id' => $zip_code->id,
                    'settlement_type_id' => $settlement_type->id
                ]);

                FederalEntity::create([
                    'key' => $federal_entity_key,
                    'name' => $federal_entity_name,
                    'zip_code_id' => $zip_code->id
                ]);

                Municipality::create([
                    'key' => $municipality_key,
                    'name' => $municipality_name,
                    'zip_code_id' => $zip_code->id
                ]);
            }
            DB::commit();
            return response()->json();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([$th]);
        }
    }

    public function getZipCode($zipCode)
    {
        return ZipCode::where('zip_code', $zipCode)
            ->first(['id', 'zip_code', 'locality'])->load(['federalEntity', 'settlements.settlementType', 'municipality']);
    }
}
