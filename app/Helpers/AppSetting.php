<?php
if (!function_exists('get_statistik')) {
    function get_statistik($key)
    {
        $statistik = \App\Models\Statistik::first();
        return $statistik ? $statistik->$key : null;
    }
}