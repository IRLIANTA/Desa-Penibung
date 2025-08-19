<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }

    public function edit()
    {
        return view('admin.dashboard.editinfo');
    }

    public function update()
    {
        return view('admin.dashboard.editdusun');
    }

    public function ubah()
    {
        return view('admin.dashboard.ubah');
    }
}
