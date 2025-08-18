<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KepalaRumahController extends Controller
{
    public function index(){
        return view('admin.kepala_rumah.index');
    }
}
