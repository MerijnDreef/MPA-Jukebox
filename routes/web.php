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

Route::get('/register', [App\Http\Controllers\RegistrationController::class, 'create']);
Route::post('register', [App\Http\Controllers\RegistrationController::class, 'store']);

Route::get('/login', [App\Http\Controllers\SessionController::class, 'create']);
Route::post('/login', [App\Http\Controllers\SessionController::class, 'store']);
Route::get('/logout', [App\Http\Controllers\SessionController::class, 'destroy']);

Route::get('songs', [App\Http\Controllers\SongController::class, 'getSong'])->name('song');

Route::get('playlist', [App\Http\Controllers\SongController::class, 'getSongPlayList'], session(['key' => 'value']))->name('songPlayList');

// Route::get('genreSpecific', [App\Http\Controllers\GenreController::class, 'getGenre'])->name('genre');
Route::get('genreSpecific/{genre_id}', [App\Http\Controllers\SongController::class, 'getSongSpecific'])->name('songGenre');
