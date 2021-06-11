<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PoviderController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaterialController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register',[AuthController::class, 'register']);

Route::post('/login',[AuthController::class, 'login']);



Route::group(['middleware'=>['auth:sanctum']], function(){

    //

    Route::get('/userInfo',[AuthController::class, 'userInfo']);

    Route::get('/logout',[AuthController::class, 'logout']);


});


//

Route::post('/addCategory',[CategoryController::class, 'addCategory']);
Route::get('/ListCategory',[CategoryController::class, 'ListCategory']);
Route::get('/ListCategoryById/{id}',[CategoryController::class, 'ListCategoryById']);
Route::put('/UpdateCategory/{id}',[CategoryController::class, 'UpdateCategory']);
Route::delete('/DeleteCategory/{id}',[CategoryController::class, 'DeleteCategory']);


//

Route::post('/addProvider',[PoviderController::class, 'addProvider']);
Route::get('/ListProvider',[PoviderController::class, 'ListProvider']);
Route::get('/ListProviderById/{id}',[PoviderController::class, 'ListProviderById']);
Route::put('/UpdateProvider/{id}',[PoviderController::class, 'UpdateProvider']);
Route::delete('/DeleteProvider/{id}',[PoviderController::class, 'DeleteProvider']);


Route::post('/addLocation',[LocationController::class, 'addLocation']);
Route::get('/ListLocation',[LocationController::class, 'ListLocation']);
Route::get('/ListLocationById/{id}',[LocationController::class, 'ListLocationById']);
Route::put('/UpdateLocation/{id}',[LocationController::class, 'UpdateLocation']);
Route::delete('/DeleteLocation/{id}',[LocationController::class, 'DeleteLocation']);




Route::post('/addMaterial',[MaterialController::class, 'addMaterial']);
Route::get('/ListMaterial',[MaterialController::class, 'ListMaterial']);
Route::get('/ListMaterialById/{id}',[MaterialController::class, 'ListMaterialById']);
Route::put('/UpdateMaterial/{id}',[MaterialController::class, 'UpdateMaterial']);
Route::delete('/DeleteMaterial/{id}',[MaterialController::class, 'DeleteMaterial']);


