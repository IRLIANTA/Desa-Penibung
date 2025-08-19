<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Menampilkan semua event
    public function index()
    {
        $events = Event::orderBy('created_at','desc')->get();
        return view('admin.event.index', compact('events'));
    }

    // Form tambah event
    public function create()
    {
        return view('admin.event.create');
    }

    // Simpan event baru
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name'        => 'required|string|max:255',
            // samakan dengan enum di migration
            'status'      => 'required|in:open,closed',
            'date'        => 'required|date',
            'start_time'  => 'required|date_format:H:i',
            // TIDAK ada rule 'number' di Laravel, pakai numeric/integer
            'partisipasi' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->only([
            'name',
            'status',
            'date',
            'start_time',
            'partisipasi',
            'description'
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        // dd($data);

        Event::create($data);

        return redirect()->route('event.index')->with('success', 'Event berhasil dibuat!');
    }

    // Detail / kelola 1 event berdasarkan ID
    public function manage($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.manage', compact('event'));
    }

    // Form edit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        return view('admin.event.edit', compact('event'));
    }

    // Update event
    public function update(Request $request)
    {
        $request->validate([
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name'        => 'required|string|max:255',
            'status'      => 'required|in:Open,Closed',
            'date'        => 'required|date',
            'start_time'  => 'required|date_format:H:i',
            'partisipasi' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $event = Event::findOrFail($request->id);

        $data = $request->only([
            'id',
            'name',
            'status',
            'date',
            'start_time',
            'partisipasi',
            'description'
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $event->update($data);

        return redirect()->route('event.index')->with('success', 'Event berhasil diupdate!');
    }

    // Hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus!');
    }
}
