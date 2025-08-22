<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialAssistance;
use Illuminate\Http\Request;

class SocialAssistanceController extends Controller
{
    // Menampilkan semua bantuan sosial
    public function index()
    {
        $socialAssistances = SocialAssistance::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.social-assistance.index', compact('socialAssistances'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.social-assistance.create');
    }

    // Simpan bantuan baru
    public function store(Request $request)
    {


        $request->validate([
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name'        => 'required|string|max:255',
            'category'    => 'required|in:Bahan Pokok,Uang Tunai,BBM Subsidi,Kesehatan',
            'amount'      => 'required|string|max:255',
            'date'        => 'required|date',
            'giver_name'  => 'required|string|max:255',
            'description' => 'nullable|string',
            'availability' => 'required|in:Tersedia,Tidak Tersedia',
        ]);

        $data = $request->only([
            'name',
            'category',
            'amount',
            'date',
            'giver_name',
            'description',
            'availability',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('social-assistance', 'public');
        }

        SocialAssistance::create($data);

        return redirect()->route('social-assistance.index')->with('success', 'Bantuan Sosial berhasil dibuat!');
    }

    // Detail / kelola 1 bantuan
    public function manage($id)
    {
        $socialAssistance = SocialAssistance::findOrFail($id);
        return view('admin.social-assistance.manage', compact('socialAssistance'));
    }

    // Form edit
    public function edit($id)
    {
        $socialAssistance = SocialAssistance::findOrFail($id);
        return view('admin.social-assistance.edit', compact('socialAssistance'));
    }

    // Update
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name'        => 'required|string|max:255',
            'category'    => 'required|in:Bahan Pokok,Uang Tunai,BBM Subsidi,Kesehatan',
            'amount'      => 'required|string|max:255',
            'date'        => 'required|date',
            'giver_name'  => 'required|string|max:255',
            'description' => 'nullable|string',
            'availability' => 'required|in:Tersedia,Tidak Tersedia',
        ]);

        $socialAssistance = SocialAssistance::findOrFail($id);

        $data = $request->only([
            'name',
            'category',
            'amount',
            'giver_name',
            'date',
            'description',
            'availability',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('social-assistance', 'public');
        }

        $socialAssistance->update($data);

        return redirect()->route('social-assistance.index')->with('success', 'Bantuan Sosial berhasil diupdate!');
    }

    // Hapus
    public function destroy($id)
    {
        $socialAssistance = SocialAssistance::findOrFail($id);
        $socialAssistance->delete();

        return redirect()->route('social-assistance.index')->with('success', 'Bantuan Sosial berhasil dihapus!');
    }
}
