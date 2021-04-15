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
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function all(Request $request): JsonResponse
    {
        return response()->json([
            'allocationsVsRdv' => AllocationsVsRdv::all()
        ]);
    }
}