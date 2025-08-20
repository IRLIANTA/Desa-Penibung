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
        $developments = Development::orderBy('created_at', 'DESC')->paginate(10);
        // dd($developments);
        return view('admin.development.index', compact('developments'));
    }

    public function create()
    {
        return view('admin.development.create');
    }

   public function manage($id)
    {
        $dev = Development::findOrFail($id);
        return view('admin.development.manage', compact('dev'));
    }
    
    public function edit($id)
    {
        $dev = Development::findOrFail($id);
        return view('admin.development.edit', compact('dev'));
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        // dd($request);s
        $validated = $request->validate([
            'total_dana' => 'nullable|numeric',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
    public function update(Request $request)
    {
        // dd($request->file());
        $id = $request->id;
        $validated = $request->validate([
            'total_dana' => 'nullable|numeric',
             'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_projek' => 'required|string|max:255',
            'giver' => 'required|string|max:255',
            'status' => 'required|in:On Going,Completed',
            'tanggal_pembangunan' => 'required|date',
            'hari' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $development = Development::findOrFail($id);
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

     public function destroy($id)
    {
        $development = Development::findOrFail($id);
        $development->delete();

        return redirect()->route('development.index')->with('success', 'Pembangunan berhasil dihapus!');
    }
}
