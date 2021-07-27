<?php

namespace App\Http\Controllers;

use App\Models\FluxTotalNat;
use App\Models\AllocationsVsRdv;
use App\Models\StocksPlateformes;
use Illuminate\Http\JsonResponse;

class AllController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json([
            'allocationsVsRdv' => AllocationsVsRdv::all(),
            'fluxTotalNat' => FluxTotalNat::all(),
            'stocksPlateformes' => StocksPlateformes::all()
        ]);
    }


    /**
     * @return JsonResponse
     */
    public function slow(): JsonResponse
    {
        sleep(10);

        return response()->json([
            'allocationsVsRdv' => AllocationsVsRdv::all(),
            'fluxTotalNat' => FluxTotalNat::all(),
            'stocksPlateformes' => StocksPlateformes::all()
        ]);
    }
}
