<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\StatistikService;
use App\Http\Controllers\Controller;

class StatistikController extends Controller

{
    protected StatistikService $statistikService;

    public function __construct(StatistikService $statistikService)
    {
        $this->statistikService = $statistikService;
    }
    public function updateStatistik(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'jml_penduduk' => 'nullable',
            'jml_rumah' => 'nullable',
            'pembangunan' => 'nullable',

        ]);

        $this->statistikService->update($data);
        return back()->with('success', 'Statistik berhasil diperbarui.');
    }
    public function updatePenduduk(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'jml_pria' => 'nullable',
            'jml_wanita' => 'nullable',
            'jml_kepala_keluarga' => 'nullable',
            'jml_kk' => 'nullable',

        ]);

        $this->statistikService->update($data);
        return back()->with('success', 'Penduduk berhasil diperbarui.');
    }
}
