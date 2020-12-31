<?php

namespace App\Http\Controllers\Api;

use App\Models\Substance;

class SubstanceController extends BaseController {

    /**
     * @OA\Get(
     *     path="/substances",
     *     summary="Show all substances",
     *     tags={"Substances"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         description="indicate current page",
     *         in="query",
     *         name="page",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function index() {
        $substances = Substance::query()->paginate(10);
        return response()->json($substances);
    }

}
