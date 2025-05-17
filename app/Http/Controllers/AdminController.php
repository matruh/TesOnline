<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin=user::all();
        return view('admin.index',compact('admin'));
    }


    public function profile()
    {
        return view('murid.profilmurid');
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
         $murid = Murid::create($request->all());
        // $buku->kategoris()->attach($request->kategori);
        if ($request->hasFile('student_card_photo')) {
        $file = $request->file('student_card_photo');
        $filename = time().'_student.'.$file->getClientOriginalExtension();
        $file->move(public_path('fotodata'), $filename);
        $murid->student_card_photo = $filename;
    }

    // Simpan file ktp_photo jika ada
    if ($request->hasFile('ktp_photo')) {
        $file = $request->file('ktp_photo');
        $filename = time().'_ktp.'.$file->getClientOriginalExtension();
        $file->move(public_path('fotodata'), $filename);
        $murid->ktp_photo = $filename;
    }
        return redirect()->route('datamurid')->with('success',' data Berhasil Dilengkapi');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Murid $murid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Murid $murid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Murid $murid)
    {
        //
    }
}
