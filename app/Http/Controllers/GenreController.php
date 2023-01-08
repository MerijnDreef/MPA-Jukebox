<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // Calls the genres

    public function getGenreIndex(){
        $genres = Genre::all();
        return view('index', compact('genres'));
    }  
}
