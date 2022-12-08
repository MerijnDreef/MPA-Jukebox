<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // Handles the session

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
}
