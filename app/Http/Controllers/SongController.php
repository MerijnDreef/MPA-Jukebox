<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;
// use App\Models\Genre;

class SongController extends Controller
{
    public function getSong(){
        $songs = Songs::all();
        return view('/index', compact('songs'));
    }
}
