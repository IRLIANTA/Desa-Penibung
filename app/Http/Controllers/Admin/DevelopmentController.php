<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    //
    public function index()
    {
        return view('admin.development.index');
    }

    public function create()
    {
        return view('admin.development.create');
    }

    public function manage()
    {
        return view('admin.development.manage');
    }

    public function edit()
    {
        return view('admin.development.edit');
    }
}
