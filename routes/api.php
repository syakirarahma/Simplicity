<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\MeatPackageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

Route::post('login', [AuthController::class, 'login']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function(){
    Route::post('logout', [AuthController::class, 'logout']);
});
// });

Route::get('meat_packages', [MeatPackageController::class, 'all']);
Route::post('meat_packages', [MeatPackageController::class, 'create']);
Route::put('meat_packages/{id}', [MeatPackageController::class, 'update']);
Route::delete('meat_packages/{id}', [MeatPackageController::class, 'delete']);