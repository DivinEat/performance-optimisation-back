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
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function all(Request $request): JsonResponse
    {
        return response()->json([
            'stockPlateforme' => StocksPlateformes::all()
        ]);
    }
}