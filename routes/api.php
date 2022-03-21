<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Starfleet;
use App\Models\Armament;
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
Route::middleware('auth:sanctum')->get('/starfleet', function (Request $request) {
    return $request->starfleet();
});
Route::get('starfleet', function() {
    return 'data:'. Starfleet::all() .'Armaments:'. Armament::all();
});