<?php

namespace App\Http\Controllers;

use App\Models\FluxTotalNat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FluxTotalNatController extends Controller
{
    public function get(string $fluxTotalNatID): JsonResponse
    {
        /** @var FluxTotalNat $fluxTotalNat */
        $fluxTotalNat = FluxTotalNat::find($fluxTotalNatID);

        if ($fluxTotalNat === null)
            return response()->json(['error' => 'Flux Total Nat not found'], 404);

        return response()->json($fluxTotalNat);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function all(Request $request): JsonResponse
    {
        return response()->json([
            'fluxTotalNat' => FluxTotalNat::all()
        ]);
    }
}