<?php

namespace app\Classes;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SessionController;

class PlaylistClass {
    private $list = [];

    public function __construct(){
        
        if(Session::has('queue')){
            $this->list = (new SessionController)->pullQueue();
        } else{
            (new SessionController)->putInQueue([]);
        }
        // dd(Session::get('queue'));
    }

    public function addSong($songId){
        array_push($this->list, $songId);
        $this->updateSession();
    }

    public function updateSession(){
        // Session::put('queue', $this->list);
        (new SessionController)->putInQueue($this->list);
    }

    public function delete($songId){
       $key = array_search($songId, $this->list);
       if($key !== false){
           unset($this->list[$key]);
       }
       $this->updateSession();
    }
}