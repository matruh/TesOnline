<?php

namespace App\Http\Controllers;

use view;
use App\Models\Guru;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $murid = Murid::all();
        $gurus = Guru::all();
        return view('guru.index',compact('murid','gurus'));
    }

    public function profile(Request $request)
    {
        $guru = Guru::all();
        return view('guru.profilguru',compact('guru'));
    }

   
    public function create(Request $request)
    {
        return view('admin.buku.tambahbuku');
    }

    public function store(Request $request)
    {
         $murid = Guru::create($request->all());
        // $buku->kategoris()->attach($request->kategori);
        if ($request->hasfile('profile_photo')) {
            $request->file('profile_photo')->move('fotodata/', $request->file('profile_photo')->getClientOriginalName());
            $murid->profile_photo = $request->file('profile_photo')->getClientOriginalName();
            $murid->save();
    }
        if ($request->hasfile('certificate_photo')) {
            $request->file('certificate_photo')->move('fotodata/', $request->file('certificate_photo')->getClientOriginalName());
            $murid->certificate_photo = $request->file('certificate_photo')->getClientOriginalName();
            $murid->save();
    }

    // Simpan file ktp_photo jika ada
    if ($request->hasfile('ktp_photo')) {
            $request->file('ktp_photo')->move('fotodata/', $request->file('ktp_photo')->getClientOriginalName());
            $murid->ktp_photo = $request->file('ktp_photo')->getClientOriginalName();
            $murid->save();

        return redirect()->route('dataguru')->with('success',' data Berhasil Dilengkapi');
        
    }
}

    public function show(Buku $buku)
    {
        //
    }


    public function edit($id)
    {
        $buku=Guru::find($id);
        return view('admin.buku.editbuku', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $buku=Guru::find($id);
        $buku->update($request->all());
        if ($request->hasfile('foto')) {
            $request->file('foto')->move('fotobuku/', $request->file('foto')->getClientOriginalName());
            $buku->foto = $request->file('foto')->getClientOriginalName();
            $buku->save();
        }

        return redirect()->route('databuku')->with('success','Buku Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $buku=Guru::find($id);
        $buku->delete();

        return redirect()->route('databuku')->with('success','Buku Berhasil Dihapus');

    }
}
