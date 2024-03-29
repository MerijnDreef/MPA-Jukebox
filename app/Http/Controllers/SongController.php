<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use App\Models\SavedLists;
use App\Models\SavedListsSongs;

class SongController extends Controller
{
    // Handles getting the songs

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

        if(Auth::user() != null){
            $userId = Auth::user()->id;
            $savedLists = SavedLists::where('user_id', $userId)->get();
            return view('songInfo', compact('song', 'savedLists'));
        }else{
            return view('songInfo', compact('song'));
        }
    }
    
    public function addToSessionPlaylist(Request $request, $id) {
        if(!$request->session()->has("PlaylistStorage")) {
            $request->session()->put("PlaylistStorage", new SavedListsSongs);
        }
    }
}
