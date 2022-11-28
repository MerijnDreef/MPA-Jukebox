<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // Handles the session

    private $list = [];

    public function __construct(){
        
        if(Session::has('queue')){
            $this->list = Session::pull('queue');
        } else{
            Session::put('queue', []);
        }
    }

    public function addSong($songId){
        array_push($this->list, $songId);
        $this->updateSession();
    }

    public function updateSession(){
        Session::put('queue', $this->list);
    }

    public function getSessionQueue(){
        // $session = Session::get('queue');
        // return $session;
        return Session::get('queue');
        // Session::get('queue');
    }

    public function SessionRegenerate(){
        // return Session::regenerate();
        Session::regenerate();
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

    public function delete($songId){
        $key = array_search($songId, $this->list);
        if($key !== false){
            unset($this->list[$key]);
        }
        $this->updateSession();
     }
}
