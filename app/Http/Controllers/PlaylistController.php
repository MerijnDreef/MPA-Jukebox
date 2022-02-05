<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\PlaylistClass;
use Illuminate\Support\Facades\Session;
use App\Models\SavedLists;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
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

        return redirect('/playlist');
    }
}
