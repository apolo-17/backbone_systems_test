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
        $zipCode = strlen($zipCode) <= 4 ? '0' . $zipCode : $zipCode;
        return ZipCode::with(['federalEntity', 'settlements.settlementType', 'municipality'])
            ->where('zip_code', $zipCode)
            ->firstOrFail(['id', 'zip_code', 'locality'])->toArray();
        //return response()->json($tmp->toArray());
    }
}
