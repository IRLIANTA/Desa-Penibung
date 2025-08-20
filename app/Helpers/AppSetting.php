<?php
if (!function_exists('get_statistik')) {
    function get_statistik($key)
    {
        $statistik = \App\Models\Statistik::first();
        return $statistik ? $statistik->$key : null;
    }
}

if (!function_exists('get_dusun')) {
    function get_dusun()
    {
        return \App\Models\Dusun::all(); 
    }
}

if (!function_exists('sum_rt')) {
    function sum_rt()
    {
        return \App\Models\Dusun::pluck('jml_rt')
            ->map(fn($rt) => (int) $rt)
            ->sum();
    }
}
if (!function_exists('sum_rw')) {
    function sum_rw()
    {
        return \App\Models\Dusun::pluck('jml_rw')
            ->map(fn($rw) => (int) $rw)
            ->sum();
    }
}
