<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;
use App\Models\Genre;

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
    public function getSongPlayList(Request $request, $id){
        $songs = Songs::all();
        $value = $request->session()->get('key');
        return view('playlist', compact('songs'));
    }
}
