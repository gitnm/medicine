<?php

namespace App\Http\Controllers\Api;

use App\Models\Manufacturer;

class ManufacturerController extends BaseController {

    /**
     * @OA\Get(
     *     path="/manufacturers",
     *     summary="Show all manufacturers",
     *     tags={"Manufacturers"},
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
        $manufacturers = Manufacturer::query()->paginate(10);
        return response()->json($manufacturers);
    }

}
