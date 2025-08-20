<?php

namespace App\Services;

use App\Models\Statistik;
use Illuminate\Support\Facades\Cache;

class StatistikService
{
    protected $statistik;

    public function __construct()
    {

        $this->statistik = Cache::rememberForever('statistiks', function () {
            return Statistik::first();
        });
    }

    public function get(?string $key = null)
    {
        if (!$this->statistik) return null;
        return $key ? ($this->statistik->$key ?? null) : $this->statistik;
    }


    public function getMany(array $keys): array
    {
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = $this->get($key);
        }
        return $result;
    }


    public function update(array $data): void
    {
        $statistik = Statistik::first();

        if ($statistik) {
            $statistik->update($data);
        } else {
            $statistik = Statistik::create($data);
        }

        Cache::forget('statistiks');
        Cache::rememberForever('statistiks', fn() => $statistik->fresh());
    }
}
