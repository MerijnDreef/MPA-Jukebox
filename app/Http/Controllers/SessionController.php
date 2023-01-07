<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\QueueController;
use App\Models\SavedListsSongs;
use App\Models\SavedLists;
use App\Models\Songs;
use App\Models\Genre;

class SessionController extends Controller
{
    // Handles the session

    public function getQueue(){
        $sessionHolder = Session::get('queue');
        return $sessionHolder;
    }

    public function pullQueue(){
        $sessionHolder = Session::pull('queue');
        return $sessionHolder;
    }

    public function putInQueue($givenList){
        $sessionHolder = Session::put('queue', $givenList);
        return $sessionHolder;
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
