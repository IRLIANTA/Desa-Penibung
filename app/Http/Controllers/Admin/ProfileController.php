<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    protected ProfileService $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    public function index()
    {
        $media = Media::all();
        return view('admin.profile.index',compact('media'));
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'desa_name' => 'nullable|string',
            'location' => 'nullable|string',
            'kepala_desa_name' => 'nullable|string',
            'kepala_desa_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'luas_petanian' => 'nullable|string',
            'luas_area' => 'nullable|string',
            'tgl_desa_dibangun' => 'nullable|date',
            'description' => 'nullable|string',

        ]);
           if ($request->hasFile('kepala_desa_profil')) {
            $data['kepala_desa_profil'] = $request->file('kepala_desa_profil')->store('profiles', 'public');
        }
        $this->profileService->update($data);
        return redirect()->route('profile.index')->with('success', 'Profile berhasil diperbarui.');
    }
}
