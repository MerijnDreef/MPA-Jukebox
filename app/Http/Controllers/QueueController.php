<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Songs;
use App\Models\Genre;
use App\Classes\PlaylistClass;
use App\Http\Controllers\SessionController;


class QueueController extends Controller
{
    // Handles the queue with it's time and songs it needs to get 

    public function index(){        
        
        $sessionData = (new SessionController)->getQueue();
        $songs = Songs::where('id', $sessionData)->get();
        $genres = Genre::all();

        if($sessionData != null){
            $totalDurationQueue = $this->CountTheTime($sessionData);
        }
        else {
            $totalDurationQueue = ['00:00'];
        }

        return view('queue', [
            'songs' => $songs,
            'genres' => $genres,
            'totalDurationQueue' => $totalDurationQueue
        ]);
    }


    public function CountTheTime($temp_lists){
        $combineSongs = [];
        $duration = 0;

        foreach($temp_lists as $templist){
                $songs = Songs::where('id', $templist)->get();
                
                foreach($songs as $song){
                    $duration += $this->timeToSeconds($song->duration);
                }

                $combineSongs = [
                    'duration' => $duration
                ];
        }
        
        $combineSongs['duration'] = $this->secondsToTime($combineSongs['duration']);
        return $combineSongs;
    }

    public function timeToSeconds($time){
        $parts = explode(':', $time);
        return $parts[0] * 60 + $parts[1];
    }

    public function secondsToTime($seconds){
        $minutes = floor($seconds / 60);
        $seconds = ($seconds % 60);
        return sprintf('%02d:%02d', $minutes, $seconds);
    }

    public function delete($songId){
        $playlist = new PlaylistClass();
        $playlist->delete($songId);
        return redirect('queue');
    }
}
