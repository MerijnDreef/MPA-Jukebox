<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QueueController extends Controller
{
    function push($song){
        Session::push('playlist', $song);
        $queueList = Session::get('playlist');
        if ($queueList == null) {
            $queueList = [];
        }
        return view('queue', compact('queueList'));
    } 
}
