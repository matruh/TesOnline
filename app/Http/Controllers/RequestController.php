<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Guru;
use App\Models\Murid;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
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
        //

    }
 public function kirimRequest(Request $request)
    {
        // Validasi input guru_id wajib dan harus ada di tabel gurus
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
        ]);

        // Ambil data guru
        $guru = Guru::findOrFail($request->guru_id);

        // Ambil user yang login
        $murid = Auth::user();

        // Pastikan user yang login adalah murid
        if (!$murid instanceof Murid) {
            return redirect()->back()->withErrors('Anda harus login sebagai murid untuk mengirim request.');
        }

        // Cek apakah sudah pernah kirim request ke guru yang sama
        $existingRequest = RequestModel::where('murid_id', $murid->id)
            ->where('guru_id', $guru->id)
            ->first();

        if ($existingRequest) {
            return redirect()->back()->withErrors('Anda sudah pernah mengirim request ke guru ini.');
        }

        // Simpan request baru
        $requestCreated = RequestModel::create([
            'murid_id' => $murid->id,
            'guru_id' => $guru->id,
            'status' => 'pending',
        ]);

        // Tampilkan hasil untuk debug (sementara)
        // dd($requestCreated);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Request kerjasama telah dikirim ke guru ' . $guru->name);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
