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
        $events = Event::all();
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
            'status'      => 'required|in:Open,Closed',
            'date'        => 'required|date',
            'start_time'  => 'required',
            'partisipas'  => 'required|number',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'status', 'date', 'start_time', 'description']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dibuat!');
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
        return view('admin.event.edit', compact('event'));
    }

    // Update event
    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name'        => 'required|string|max:255',
            'status'      => 'required|in:Open,Closed',
            'date'        => 'required|date',
            'start_time'  => 'required',
            'description' => 'nullable|string',
        ]);

        $event = Event::findOrFail($id);

        $data = $request->only(['name', 'status', 'date', 'start_time', 'description']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diupdate!');
    }

    // Hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus!');
    }
}
