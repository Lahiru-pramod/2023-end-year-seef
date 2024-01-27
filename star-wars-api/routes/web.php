<?php

use App\Http\Controllers\StarWarsPlanetsList;
use App\Livewire\Planet;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('star-wars');
});

Route::controller(StarWarsPlanetsList::class)->group(function () {
    Route::post('/planet', 'go');
});