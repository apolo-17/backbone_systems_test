<?php

namespace App\Http\Service;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use FilesystemIterator;
use Illuminate\Support\Facades\DB;

class StoreZipCodes
{
    public function register($file)
    {
        DB::beginTransaction();
        try {
            $path = public_path('/zip_code');

            $lines = file($path . '/' . $file);
            $utf8_lines_decode = array_map('utf8_encode', $lines);
            $array_csv = array_map('str_getcsv', $lines);

            for ($i = 1; $i < sizeof($array_csv); $i++) {

                $zip_code = ZipCode::firstOrCreate(['zip_code' => $array_csv[$i][0]], ['locality' => $this->changeFormatName(strtoupper($array_csv[$i][5]))]);

                $settlement_type = SettlementType::firstOrCreate(['name' => ucfirst(strtolower($array_csv[$i][2]))]);

                Settlement::create([
                    'key' => intval($array_csv[$i][12]),
                    'name' => $this->changeFormatName(strtoupper($array_csv[$i][1])),
                    'zone_type' => $this->changeFormatName(strtoupper($array_csv[$i][13])),
                    'zip_code_id' => $zip_code->id,
                    'settlement_type_id' => $settlement_type->id
                ]);

                FederalEntity::create([
                    'key' => $array_csv[$i][7],
                    'name' => $this->changeFormatName(strtoupper($array_csv[$i][4])),
                    'zip_code_id' => $zip_code->id
                ]);

                Municipality::create([
                    'key' => $array_csv[$i][11],
                    'name' => $this->changeFormatName(strtoupper($array_csv[$i][3])),
                    'zip_code_id' => $zip_code->id
                ]);
            }

            DB::commit();
            return response()->json('Succesfull');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([$th]);
        }
    }

    private function changeFormatName(string $name)
    {
        $name = strtoupper($name);

        $name = str_replace(
            array('á', 'Á', 'é', 'É', 'í', 'Í', 'ó', 'Ó', 'ú', 'Ú', 'ñ'),
            array('A', 'A', 'E', 'E', 'I', 'I', 'O', 'O', 'U', 'U', 'Ñ'),
            $name
        );

        return $name;
    }
}
