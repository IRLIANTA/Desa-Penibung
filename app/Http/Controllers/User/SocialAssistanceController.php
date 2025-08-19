<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialAssistanceController extends Controller
{
    //
    public function index()
    {
        return view('user.social-assistance.index');
    }
}
