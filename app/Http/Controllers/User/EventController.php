<?php

namespace App\Http\Controllers\User;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    //
    public function index()
    {
          $events = Event::all();
        return view('user.event.index',compact('events'));
    }

    public function manage($id){
           $event = Event::findOrFail($id);
        return view('admin.event.manage', compact('event'));
    }
}
