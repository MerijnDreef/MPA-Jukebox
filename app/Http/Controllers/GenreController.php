<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function getGenreIndex(){
        $genres = Genre::all();
        return view('index', compact('genres'));
    }

    // public function getGenre(){
    //     $genres = Genre::all();
    //     return view('genreSpecific', compact('genres'));
    // }

  
}
