<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Development;
use Illuminate\Support\Facades\Storage;

class DevelopmentController extends Controller
{
    public function index()
    {
        $developments = Development::all();
        return view('admin.development.index', compact('developments'));
    }

    public function create()
    {
        return view('admin.development.create');
    }

    public function manage()
    {
        $developments = Development::all();
        return view('admin.development.manage', compact('developments'));
    }

    public function edit(Development $development)
    {
        return view('admin.development.edit', compact('development'));
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'total_dana' => 'required|numeric',
            'thumbnail' => 'nullable|image|max:2048',
            'nama_projek' => 'required|string|max:255',
            'giver' => 'required|string|max:255',
            'status' => 'required|in:On Going,Completed',
            'tanggal_pembangunan' => 'required|date',
            'hari' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Development::create($validated);

        return redirect()->route('development.index')->with('success', 'Data pembangunan berhasil ditambahkan!');
    }

    // Method untuk update data yang sudah ada
    public function update(Request $request, Development $development)
    {
        $validated = $request->validate([
            'total_dana' => 'required|numeric',
            'thumbnail' => 'nullable|image|max:2048',
            'nama_projek' => 'required|string|max:255',
            'giver' => 'required|string|max:255',
            'status' => 'required|in:On Going,Completed',
            'tanggal_pembangunan' => 'required|date',
            'hari' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($development->thumbnail) {
                Storage::disk('public')->delete($development->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $development->update($validated);

        return redirect()->route('development.index')->with('success', 'Data pembangunan berhasil diperbarui!');
    }
}
