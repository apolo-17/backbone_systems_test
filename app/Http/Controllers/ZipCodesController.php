<?php

namespace App\Http\Controllers;

use App\Http\Service\StoreZipCodes;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use FilesystemIterator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZipCodesController extends Controller
{
    public function getZipCode($zipCode)
    {
        try {

            return ZipCode::where('zip_code', $zipCode)
                ->first(['id', 'zip_code', 'locality'])->load(['federalEntity', 'settlements.settlementType', 'municipality']);
        } catch (\Throwable $th) {
            return response('Not found zip code', 404);
        }
    }
}
