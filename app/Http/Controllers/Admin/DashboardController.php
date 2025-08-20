<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $dusun = Dusun::all();
        return view('admin.dashboard.index',compact('dusun'));
    }

    public function edit()
    {
        return view('admin.dashboard.editinfo');
    }

    public function update()
    {
        $dusun = Dusun::all();
        return view('admin.dashboard.editdusun',compact('dusun'));
    }

    public function ubah()
    {
        return view('admin.dashboard.ubah');
    }

    public function storeDusun(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'dusun'               => 'required|array|min:1',
            'dusun.*'             => 'required|string|max:100',
            'nama_kepala_dusun'   => 'required|array|min:1',
            'nama_kepala_dusun.*' => 'required|string|max:100',
            'jml_rt'                  => 'required|array|min:1',
            'jml_rt.*'                => 'required|integer|min:1',
            'jml_rw'                  => 'required|array|min:1',
            'jml_rw.*'                => 'required|integer|min:1',
        ]);

        $data = [];
        $count = count($request->dusun);

        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'dusun'        => $request->dusun[$i],
                'nama_kepala_dusun' => $request->nama_kepala_dusun[$i],
                'jml_rt'          => $request->jml_rt[$i],
                'jml_rw'          => $request->jml_rw[$i],
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        DB::table('dusun')->insert($data);

        return redirect()->route('dashboard')->with('success', 'Data dusun berhasil disimpan.');
    }
}
