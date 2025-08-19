<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        return view('admin.event.index');
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function manage()
    {
        return view('admin.event.manage');
    }

    public function edit()
    {
        return view('admin.event.edit');
    }
}
