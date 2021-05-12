<?php

namespace App\Http\Controllers;

use App\Models\StocksPlateformes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StocksPlateformesController extends Controller
{
    public function get(string $stockPlateformeID): JsonResponse
    {
        /** @var StocksPlateformes $stockPlateforme */
        $stockPlateforme = StocksPlateformes::find($stockPlateformeID);

        if ($stockPlateforme === null)
            return response()->json(['error' => 'Stock Plateforme not found'], 404);

        return response()->json($stockPlateforme);
    }

    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json(StocksPlateformes::all());
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'nb_UCD' => 'required|numeric',
            'nb_doses' => 'required|numeric',
            'type_de_vaccin' => 'required|string',
            'date' => 'required'
        ]);

        return response()->json(StocksPlateformes::create($validated));
    }

    /**
     * @param Request $request
     * @param String $stockPlateformeID
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $stockPlateformeID)
    {
        $validated = $this->validate($request, [
            'nb_UCD' => 'sometimes|numeric',
            'nb_doses' => 'sometimes|numeric',
            'type_de_vaccin' => 'sometimes|string',
            'date' => 'sometimes'
        ]);

        $stocksPlateforme = StocksPlateformes::find($stockPlateformeID);
        
        if($stocksPlateforme === null) {
            return abort(404);
        }

        return response()->json($stocksPlateforme->update($validated));
    }

    public function destroy(string $stockPlateformeID)
    {
        StocksPlateformes::find($stockPlateformeID)->delete();
    }
}