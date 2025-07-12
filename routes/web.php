<?php

use Illuminate\Support\Facades\Route;
use App\Models\Donut;

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
    return view('welcome');
});

Route::get('/', function () {
    $donuts = Donut::with('batters', 'toppings')->get();
    return view('donuts.index', compact('donuts'));
});
