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
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json([
            'fluxTotalNat' => FluxTotalNat::all()
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nb_ucd' => 'required|numeric',
            'nb_doses' => 'required|numeric',
            'type_de_vaccin' => 'required|string',
            'date_fin_semaine' => 'required'
        ]);

        return response()->json(FluxTotalNat::create($validated));
    }

    /**
     * @param Request $request
     * @param String $fluxTotalNatID
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $fluxTotalNatID)
    {
        $validated = $request->validate([
            'nb_ucd' => 'sometimes|numeric',
            'nb_doses' => 'sometimes|numeric',
            'type_de_vaccin' => 'sometimes|string',
            'date_fin_semaine' => 'sometimes'
        ]);

        $fluxTotalNat = FluxTotalNat::find($fluxTotalNatID);
        
        if($fluxTotalNat === null) {
            return abort(404);
        }

        return response()->json($fluxTotalNat->update($validated));
    }

    public function destroy(string $fluxTotalNatID)
    {
        FluxTotalNat::find($fluxTotalNatID)->delete();
    }
}