<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarfleetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Starfleet;
use App\Models\Armament;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 */
Route::get('fleet/{id}/edit', function (Request $request, $id) {
    $id = $id;
    $starfleet = Starfleet::all();
    $armament = Armament::all();
    return view('starfleet.edit', compact('id', 'starfleet', 'armament'));
});
Route::get('/fleet', function (Request $request, $id) {
    $id = $id;
    $starfleet = Starfleet::all();
    $armament = Armament::all();
    return view('starfleet.index', compact('id', 'starfleet', 'armament'));
});

Route::get('fleet/create', function () {
    return view('starfleet.create');
});

Route::get('fleet/{id}', function (Starfleet $starfleet, $id) {
    $armament = Armament::all();
    $starfleet = Starfleet::all();
    $id = $id;
    return view('starfleet.show', compact('starfleet', 'armament', 'id'));
});

Route::resource('fleet', StarfleetController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
