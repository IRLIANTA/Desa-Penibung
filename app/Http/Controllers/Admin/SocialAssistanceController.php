<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialAssistanceController extends Controller
{
    //
    public function index()
    {
        return view('admin.social-assistance.index');
    }

    public function create()
    {
        return view('admin.social-assistance.create');
    }

    public function manage()
    {
        return view('admin.social-assistance.manage');
    }

    public function edit()
    {
        return view('admin.social-assistance.edit');
    }

}
