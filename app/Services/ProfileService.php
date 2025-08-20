<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Facades\Cache;

class ProfileService
{
    protected $profile;

    public function __construct()
    {

        $this->profile = Cache::rememberForever('profiles', function () {
            return Profile::first();
        });
    }

    public function get(?string $key = null)
    {
        if (!$this->profile) return null;
        return $key ? ($this->profile->$key ?? null) : $this->profile;
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
        $profile = Profile::first();

        if ($profile) {
            $profile->update($data);
        } else {
            $profile = Profile::create($data);
        }

        Cache::forget('profiles');
        Cache::rememberForever('profiles', fn() => $profile->fresh());
    }
}
