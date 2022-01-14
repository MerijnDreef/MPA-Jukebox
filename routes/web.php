<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PlaylistController;

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

Route::get('/', [GenreController::class, 'getGenreIndex'])->name('genre');

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);

Route::get('songs', [SongController::class, 'getSong'])->name('song');
Route::get('songs/{songId}', [PlaylistController::class, 'create']);
Route::post('songs/{songId}', [PlaylistController::class, 'session']);

Route::get('playlist', [SongController::class, 'getSongPlayList'], session(['key' => 'value']))->name('songPlayList');
// Route::post('playlist', [SongController::class, 'getSongPlayList'], ); unfinished soon to be fixed

Route::get('queue', [QueueController::class, 'index']);
// Route::get('/queue/{song}', [QueueController::class, 'push'])->name('pushqueue');

// Route::get('genreSpecific', [GenreController::class, 'getGenre'])->name('genre');
Route::get('genreSpecific/{genre_id}', [SongController::class, 'getSongSpecific'])->name('songGenre');
