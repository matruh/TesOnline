<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Guru;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    if ($request->has('search')) {
            $gurus = Guru::where('skill', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $gurus = Guru::all();    // Data guru
        }
    return view('murid.index', compact('gurus'));
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
        if ($request->hasfile('student_card_photo')) {
            $request->file('student_card_photo')->move('fotodata/', $request->file('student_card_photo')->getClientOriginalName());
            $murid->student_card_photo = $request->file('student_card_photo')->getClientOriginalName();
            $murid->save();
    }

    // Simpan file ktp_photo jika ada
    if ($request->hasfile('ktp_photo')) {
            $request->file('ktp_photo')->move('fotodata/', $request->file('ktp_photo')->getClientOriginalName());
            $murid->ktp_photo = $request->file('ktp_photo')->getClientOriginalName();
            $murid->save();
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
