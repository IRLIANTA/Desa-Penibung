<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_path'   => 'required|array|min:1',
            'file_path.*' => 'file|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|array',
        ], [
            'file_path.required' => 'Minimal harus upload 1 foto desa.',
            'file_path.*.mimes'  => 'Format file harus JPG, JPEG, PNG atau WEBP.',
            'file_path.*.max'    => 'Ukuran maksimal 2MB per file.',
        ]);

        if ($request->hasFile('file_path')) {
            foreach ($request->file('file_path') as $index => $file) {
                $path = $file->store('desa_media', 'public');

                Media::create([
                    'file_path'   => $path,
                    'description' => $request->description[$index] ?? null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Foto desa berhasil disimpan.');
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        $total = Media::count();
        if ($total <= 1) {
            return redirect()->back()->with('error', 'Minimal harus ada 1 foto desa, tidak bisa dihapus semua.');
        }

        if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        return redirect()->back()->with('success', 'Foto desa berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }


}
