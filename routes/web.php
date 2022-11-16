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

Route::get('songs', [SongController::class, 'getSong'])->name('songs');
Route::get('songs/{songId}', [PlaylistController::class, 'create']);
Route::post('songs/{songId}', [PlaylistController::class, 'session']);

// Route::get('songInfo/{songId}', [SongController::class, 'getSongInfo'])->name('songInfo');
Route::post('songInfo/{songId}', [SongController::class, 'getSongInfo'])->name('songInfo');

Route::get('playlists', [PlaylistController::class, 'index'])->name('playlists');
Route::get('playlists/{playlistId}', [PlaylistController::class, 'show']);
Route::post('playlists/{savedList}/saveList', [PlaylistController::class, 'edit']);
Route::get('playlists/{savedList}/saveList', [PlaylistController::class, 'update']);
Route::post('playlists/delete/{playlistId}', [PlaylistController::class, 'delete']);

Route::post('playlists/delete/{playlistId}/{songId}', [PlaylistController::class, 'removeSongFromplaylist']);

Route::get('playlists/{playlistId}/addSongs', [SongController::class, 'getSong']);
Route::post('playlists/{playlistId}/addSongs/{song_id}', [PlaylistController::class, 'addSongToPlaylist']);

Route::get('queue', [QueueController::class, 'index']);
Route::post('queue/delete/{songId}', [QueueController::class, 'delete']);

Route::post('queue', [PlaylistController::class, 'store']);

Route::get('genreSpecific/{genre_id}', [SongController::class, 'getSongSpecific'])->name('songGenre');
