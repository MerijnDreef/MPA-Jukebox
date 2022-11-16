<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;
use App\Models\Genre;
use App\Models\SavedListsSongs;

class SongController extends Controller
{
    public function getSong(){
        $songs = Songs::all();
        return view('songs', compact('songs'));
    }

    public function getSongSpecific($genre_id){
        $songs = Songs::where("genre_id", $genre_id)->get();
        $genres = Genre::where("id", $genre_id)->get();
        return view('genreSpecific', compact('songs', 'genres'));
    }

    public function getSongInfo($songId){
        $song = Songs::where("id", $songId)->get();

        return view('songInfo', compact('song'));
    }
    
    public function addToSessionPlaylist(Request $request, $id) {
        if(!$request->session()->has("PlaylistStorage")) {
            $request->session()->put("PlaylistStorage", new SavedListsSongs);
        }
    }
}
