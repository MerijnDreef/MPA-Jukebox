<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\QueueController;


class SessionController extends Controller
{
    // Handles the session

    // This function is from QueueController
    public function index(){        
        $songs = Songs::all();
        $genres = Genre::all();
        $temp_list = Session::get('queue');

        if($temp_list != null){
            $totalDurationQueue = (new QueueController)->CountTheTime($temp_list);
        }
        else {
            $totalDurationQueue = ['00:00'];
        }

        Session::regenerate();


        return view('queue', [
            'songs' => $songs,
            'genres' => $genres,
            'totalDurationQueue' => $totalDurationQueue
        ]);
    }

    // This function is from PlaylistController
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

    public function create()
    {
        return view('login');
    }
    
    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/');
    }
    
    public function destroy()
    {
        auth()->logout();
        Session::flush();
        
        return redirect()->to('/');
    }
}
