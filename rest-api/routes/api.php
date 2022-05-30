<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// COMPANY ROUTE

Route::get('company', [CompanyController::class,'index']);
Route::get('company/{id}/show', [CompanyController::class,'show']);
Route::post('company/add', [CompanyController::class,'store']);
Route::post('company/{id}/update', [CompanyController::class,'update']);
Route::post('company/{id}/delete', [ProductController::class,'destroy']);

// STATION ROUTE

Route::get('stations', [StationController::class,'index']);
Route::get('station/{id}/show', [StationController::class,'show']);
Route::post('station/add', [StationController::class,'store']);
Route::post('station/{id}/update', [StationController::class,'update']);
Route::post('station/{id}/delete', [StationController::class,'destroy']);
Route::post('findstations', [StationController::class,'allStation']);


// For APi Authentication

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
