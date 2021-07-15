<?php

use App\Models\District;
use App\Models\Province;
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

Route::get('/provinces', function(){ return Province::all(); });
Route::get('/districts/{province}', function(Province $province){ return $province->district; });
Route::get('/villages/{district}', function(District $district){ return $district->villages; });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
