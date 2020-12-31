<?php

namespace App\Http\Controllers\Api;

use App\Models\Medicine;
use App\Http\Requests\MedicineRequest;
use Illuminate\Database\QueryException;
use Response;

class MedicineController extends BaseController {

    /**
     * @OA\Get(
     *     path="/medicines",
     *     summary="Show all medicines",
     *     tags={"Medicines"},
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
        $medicines = Medicine::query()->paginate(10);
        return response()->json($medicines);
    }

    /**
     * @OA\Post(
     *   path="/medicines",
     *   summary="Add one medicine",
     *   tags={"Medicines"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="Updated name of the medicine",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="substance_id",
     *                   description="Updated substance_id of the medicine",
     *                   type="integer",
     *                   format="int64"
     *               ),
     *               @OA\Property(
     *                   property="manufacturer_id",
     *                   description="Updated manufacturer_id of the medicine",
     *                   type="integer",
     *                   format="int64"
     *               ),
     *               @OA\Property(
     *                   property="price",
     *                   description="Updated price of the medicine",
     *                   type="number",
     *                   format="double"
     *               )
     *           )
     *       )
     *   ),
     *   @OA\Response(
     *       response=200,
     *       description="Ok"
     *   ),
     *   @OA\Response(
     *       response=400,
     *       description="Bad Request"
     *   ),
     *   @OA\Response(
     *       response="500",
     *       description="Internal Server Error"
     *   )
     * )
     */
    public function store(MedicineRequest $request) {
        try {
            $medicine = new Medicine();
            $medicine->fill($request->all());
            $medicine->save();
            return response()->json(['message' => 'Entry successfully created']);
        } catch (QueryException $e) {
            return Response::json([
                        'message' => $e->getMessage()
                            ], 400);
        }
    }

    /**
     * @OA\Get(
     *     path="/medicines/{id}",
     *     summary="Show one medicine",
     *     tags={"Medicines"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         description="Id medicine",
     *         in="path",
     *         name="id",
     *         required=true,
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
     *         response=404,
     *         description="Not Found"
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function show($id) {
        $medicine = Medicine::where('id', $id)->first();
        if (!$medicine) {
            return response('', 404);
        }
        return response()->json($medicine);
    }

    /**
     * @OA\Put(
     *   path="/medicines/{id}",
     *   summary="Update one medicine",
     *   tags={"Medicines"},
     *   security={{"bearerAuth":{}}},
     *   @OA\Parameter(
     *       description="Id medicine",
     *       in="path",
     *       name="id",
     *       required=true,
     *       @OA\Schema(
     *         type="integer",
     *         format="int64"
     *       )
     *   ),
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="Updated name of the medicine",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="substance_id",
     *                   description="Updated substance_id of the medicine",
     *                   type="integer",
     *                   format="int64"
     *               ),
     *               @OA\Property(
     *                   property="manufacturer_id",
     *                   description="Updated manufacturer_id of the medicine",
     *                   type="integer",
     *                   format="int64"
     *               ),
     *               @OA\Property(
     *                   property="price",
     *                   description="Updated price of the medicine",
     *                   type="number",
     *                   format="double"
     *               )
     *           )
     *       )
     *   ),
     *   @OA\Response(
     *       response=200,
     *       description="Ok"
     *   ),
     *   @OA\Response(
     *       response=400,
     *       description="Bad Request"
     *   ),
     *   @OA\Response(
     *       response=404,
     *       description="Not found"
     *   ),
     *   @OA\Response(
     *       response="500",
     *       description="Internal Server Error"
     *   )
     * )
     */
    public function update(MedicineRequest $request, $id) {
        try {
            $medicine = Medicine::where('id', $id)->first();
            if (!$medicine) {
                return response('', 404);
            }
            $medicine->fill($request->all());
            $medicine->update();
            return response()->json(['message' => 'Entry successfully updated']);
        } catch (QueryException $e) {
            return Response::json([
                        'message' => $e->getMessage()
                            ], 400);
        }
    }

    /**
     * @OA\Delete(
     *     path="/medicines/{id}",
     *     summary="Delete one medicine",
     *     tags={"Medicines"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         description="Id medicine",
     *         in="path",
     *         name="id",
     *         required=true,
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
     *         response=404,
     *         description="Not Found"
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function destroy($id) {
        $medicine = Medicine::where('id', $id)->first();
        if (!$medicine) {
            return response('', 404);
        }
        $medicine->delete();
        return response()->json(['message' => 'Entry successfully deleted']);
    }

}
