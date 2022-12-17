<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\PlaylistClass;
use Illuminate\Support\Facades\Session;
use App\Models\SavedLists;
use Illuminate\Support\Facades\Auth;
use App\Models\Songs;
use App\Models\SavedListsSongs;

class PlaylistController extends Controller
{
    // Handles the playlists with it's time, what it needs to get and putting songs in playlists

    public function index(){
       if(Auth::user() != null) {
            $userId = Auth::user()->id;
            $savedLists = SavedLists::where('user_id', $userId)->get();
            return view('playlists', ['savedLists' => $savedLists]);   
        }else{
            return redirect()->to('/');
        }
    }

    public function storePlaylist(Request $request){
        $this->validate(request(),[
            'name' => ['required', 'string', 'max:255']
            ]); 
                   
            $playlist = SavedLists::create([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
            ]);

            $list = Session::pull('queue');
            $songs = Songs::all();
            foreach($songs as $song){
                $key = array_search($song->id, $list);
                if($key !== false){
                    $songList = $list[$key];
                    SavedListsSongs::create([
                        'songs_id' => $songList,
                        'saved_lists_id' => $playlist->id,
                    ]);
                }
            }

                        
        return redirect('/playlists');
    }

    public function show($playlistId){
        if(Auth::user() != null) {
            $savedList = SavedLists::where('id', $playlistId)->with('savedListsSongs.songs')->get();
            $totalDuration = $this->countTheTime($playlistId);

            return view('playlist', [
                'savedList' => $savedList,
                'totalDuration' => $totalDuration
            ]);
        }else{
            return redirect()->to('/');
        }
    }

    public function update(SavedLists $savedLists){
        return view('saveList', ['savedLists' => $savedLists]);
    }

    public function edit(SavedLists $savedList){
        if(Auth::user() != null) {
            $attributes = request()->validate([
                'name' => 'required'
            ]); 

            $savedList->update($attributes);

            return redirect('playlists/' . $savedList->id);
        }else{
            return redirect()->to('/');
        }
    }


    public function delete($playlistId){
        if(Auth::user() != null) {
            $savedLists = SavedLists::find($playlistId);
            $savedListsSongs = SavedListsSongs::where('saved_lists_id', $playlistId)->get();

            foreach($savedListsSongs as $savedListsSong){
                if($playlistId == $savedListsSong->saved_lists_id){
                    SavedListsSongs::where('saved_lists_id', $playlistId)->delete();
                }
            }
            SavedLists::where('id', $playlistId)->delete();

            return redirect('playlists');
        }else{
            return redirect()->to('/');
        }
    }

    public function removeSongFromplaylist($playlistId, $songId){
        if(Auth::user() != null) {
            $savedListsSongs = SavedListsSongs::where('saved_lists_id', $playlistId)->get();
            foreach($savedListsSongs as $savedListSong){
                if($playlistId == $savedListSong->saved_lists_id && $songId == $savedListSong->songs_id){
                    $savedListSong->delete($songId);

                }
            }
            return redirect('playlists/' . $playlistId);
        }else{
            return redirect()->to('/');
        }
    }

    public function addSongToPlaylist($playlistId, $songId){
        if(Auth::user() != null) {
            SavedListsSongs::create([
                'saved_lists_id' => $playlistId,
                'songs_id' => $songId
            ]);

            return redirect('playlists/' . $playlistId);
        }else{
            return redirect()->to('/');
        }
    }

    public function songInfoPlaylist(Request $request, $songId){
        SavedListsSongs::create([
            'saved_lists_id' => $request->playlists,
            'songs_id' => $songId
        ]);

        return redirect('songs');
    }

    public function session($songId){
        $playlist = new PlaylistClass();
        $playlist->addSong($songId);
        return redirect('songs');
    }

    public function create(){
        return view('songs');
    }

    public function countTheTime($playlistId){
        $combineSongs = [];
        $duration = 0;

        $savedListsSongs = savedListsSongs::where('saved_lists_id', $playlistId)->get();

        foreach($savedListsSongs as $savedListSong){
            $songs = Songs::where('id', $savedListSong->songs_id)->get();

            foreach($songs as $song){
                $duration += $this->timeToSeconds($song->duration);
            }

            $combineSongs = [
                'data' => $savedListSong->saved_lists_id,
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
}
