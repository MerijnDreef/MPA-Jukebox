<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QueueController extends Controller
{
    function push($song){
        Session::push('queue', $song);
        $queueList = Session::get('queue');
        if ($queueList == null) {
            $queueList = [];
        }
        return view('queue', compact('queueList'));
    } 

    public function index(){
        
        return view('queue');
    }
}
