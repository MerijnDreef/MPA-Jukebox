<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\GenreController::class, 'getGenreIndex'])->name('genre');

// Route::get('/', function () {
//     return view('index');
// });

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

// Route::get('genreSpecific', [App\Http\Controllers\GenreController::class, 'getGenre'])->name('genre');
Route::get('genreSpecific', [App\Http\Controllers\SongController::class, 'getSong'])->name('song');

// Route::get('genre/genreSpecific', function () {
//     return view('genre/genreSpecific');
// });
