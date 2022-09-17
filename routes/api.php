<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApitestController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('senddata', [ApitestController::class, 'store']);
Route::get('getdata',[ApitestController::class, 'getData']);
Route::put('update', [ApitestController::class, 'update']);
Route::delete("delete/{id}",[ApitestController::class, 'destroy']);
Route::get("search/{name}",[ApitestController::class, 'search']);
Route::post('testvalidation', [ApitestController::class, 'testValidation']);


