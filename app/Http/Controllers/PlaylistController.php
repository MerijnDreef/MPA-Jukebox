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
    public function index(){
        $userId = Auth::user()->id;
        $savedLists = SavedLists::where('user_id', $userId)->get();
        return view('playlists', ['savedLists' => $savedLists]);
    }

    public function show($playlistId){
        $savedList = SavedLists::where('id', $playlistId)->with('savedListsSongs.songs')->get();
        return view('playlist', ['savedList' => $savedList]);
    }

    public function update(SavedLists $savedLists){
        return view('saveList', ['savedLists' => $savedLists]);
    }

    public function edit(SavedLists $savedList){
        // dd($savedList);
        $attributes = request()->validate([
            'name' => 'required'
        ]); 

        $savedList->update($attributes);

        return redirect('playlists/' . $savedList->id);
    }

    public function delete($playlistId){
        $savedLists = SavedLists::find($playlistId);
        $savedListsSongs = SavedListsSongs::where('saved_lists_id', $playlistId)->get();

        foreach($savedListsSongs as $savedListsSong){
            if($playlistId == $savedListsSong->saved_lists_id){
                SavedListsSongs::where('saved_lists_id', $playlistId)->delete();
            }
        }
        SavedLists::where('id', $playlistId)->delete();

        return redirect('playlists');
    }

    public function addSongToPlaylist($playlistId, $songId){
        SavedListsSongs::create([
            'saved_lists_id' => $playlistId,
            'song_id' => $songId
        ]);

        return redirect('playlists/' . $playlistId);
    }

    public function session($songId){
        $playlist = new PlaylistClass();
        $playlist->addSong($songId);
        return redirect('songs');
    }

    public function create(){
        return view('songs');
    }
    
    public function store(Request $request){
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
}
