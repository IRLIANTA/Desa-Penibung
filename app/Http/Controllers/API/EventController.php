<?php

// app/Http/Controllers/EventController.php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'status' => 'required|in:Open,Closed',
            'start_time' => 'required|date_format:H:i', // ⬅️ ganti dari price ke start_time
            'date' => 'required|date',
            'duration_days' => 'nullable|integer',
            'description' => 'nullable|string'
        ]);

        // Upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('events', 'public');
        }

        Event::create($validated);

        return redirect()->route('event.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function manage(Event $event)
    {
        return view('admin.event.manage', compact('event'));
    }
}
