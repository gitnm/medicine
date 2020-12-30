<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubstanceController;
use App\Http\Controllers\Api\ManufacturerController;
use App\Http\Controllers\Api\MedicineController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('substances', [SubstanceController::class, 'index']);
Route::get('manufacturers', [ManufacturerController::class, 'index']);
Route::resource('medicines', MedicineController::class);