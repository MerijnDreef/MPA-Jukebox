<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Songs;
use App\Models\Genre;
use App\Classes\PlaylistClass;

class QueueController extends Controller
{
    // function push($song){
    //     Session::push('queue', $song);
    //     $queueList = Session::get('queue');
    //     if ($queueList == null) {
    //         $queueList = [];
    //     }
    //     return view('queue', compact('queueList'));
    // } 

    public function index(){
        $songs = Songs::all();
        $genres = Genre::all();

        return view('queue', [
            'songs' => $songs,
            'genres' => $genres
        ]);
    }

    public function delete($songId){
        $playlist = new PlaylistClass();
        $playlist->delete($songId);
        return redirect('queue');
    }
}
