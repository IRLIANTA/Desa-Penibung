<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function feedbackUser()
    {
        $feedback = Feedback::all();
        return view('admin.feedback.feedback-user', compact('feedback'));
    }

    public function getData(Request $request)
    {
        $query = Feedback::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                    ->orWhere('isi', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $perPage = $request->get('per_page', 10);
        $data = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return response()->json($data);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,selesai',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->status = $request->status;
        $feedback->save();

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui',
            'data'    => $feedback
        ]);
    }

    public function widgetData()
    {
        $total = Feedback::count();
        $belumDibaca = Feedback::where('visit', 0)->count();
        $sudahDibaca = Feedback::where('visit', 1)->count();
        $sudahDiselesaikan = Feedback::where('status', 'selesai')->count();

        return response()->json([
            'total' => $total,
            'belumDibaca' => $belumDibaca,
            'sudahDibaca' => $sudahDibaca,
            'sudahDiselesaikan' => $sudahDiselesaikan,
        ]);
    }

    public function dibaca($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->visit = 1;
        $feedback->save();

        $total = Feedback::count();
        $belumDibaca = Feedback::where('visit', 0)->count();
        $sudahDibaca = Feedback::where('visit', 1)->count();
        $sudahDiselesaikan = Feedback::where('status', 'selesai')->count();

        return response()->json([
            'success' => true,
            'data' => [
                'total' => $total,
                'belumDibaca' => $belumDibaca,
                'sudahDibaca' => $sudahDibaca,
                'sudahDiselesaikan' => $sudahDiselesaikan,
            ]
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'no_telp'      => 'required|string|max:20',
            'alamat'  => 'required|string|max:255',
            'isi' => 'required|string|max:500',
            'status' => 'pending',
        ]);

        Feedback::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Feedback berhasil dikirim'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
