<?php

namespace App\Http\Controllers;

use App\Models\AllocationsVsRdv;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AllocationsVsRdvController extends Controller
{
    public function get(string $allocationVsRdvID): JsonResponse
    {
        /** @var AllocationsVsRdv $fluxTotalNat */
        $allocationsVsRdv = AllocationsVsRdv::find($allocationVsRdvID);

        if ($allocationsVsRdv === null)
            return response()->json(['error' => 'Allocations vs rdv not found'], 404);

        return response()->json($allocationsVsRdv);
    }

    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json([
            'allocationsVsRdv' => AllocationsVsRdv::all()
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
            'id_centre' => 'required|numeric',
            'date_debut_semaine' => 'required',
            'code_region' => 'required|numeric',
            'nom_region' => 'required|string',
            'code_departement' => 'required|numeric',
            'nom_departement' => 'required|string',
            'commune_insee' => 'required|string',
            'nom_centre' => 'required|string',
            'nombre_ucd' => 'required|numeric',
            'doses_allouees' => 'required|numeric',
            'rdv_pris' => 'required|numeric'
        ]);

        return response()->json(AllocationsVsRdv::create($validated));
    }

     /**
     * @param Request $request
     * @param String $allocationVsRdvID
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $allocationVsRdvID)
    {
        $validated = $request->validate([
            'id_centre' => 'sometimes|numeric',
            'date_debut_semaine' => 'sometimes',
            'code_region' => 'sometimes|numeric',
            'nom_region' => 'sometimes|string',
            'code_departement' => 'sometimes|numeric',
            'nom_departement' => 'sometimes|string',
            'commune_insee' => 'sometimes|string',
            'nom_centre' => 'sometimes|string',
            'nombre_ucd' => 'sometimes|numeric',
            'doses_allouees' => 'sometimes|numeric',
            'rdv_pris' => 'sometimes|numeric'
        ]);

        $allocationVsRdv = AllocationsVsRdv::find($allocationVsRdvID);
        
        if($allocationVsRdv === null) {
            return abort(404);
        }

        return response()->json($allocationVsRdv->update($validated));
    }

    public function destroy(string $allocationVsRdvID)
    {
        AllocationsVsRdv::find($allocationVsRdvID)->delete();
    }
}