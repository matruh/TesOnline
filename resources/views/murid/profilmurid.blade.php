@extends('layouts.app')
@section('content')
<main>
        <h1 class="text-center">Lengkapi Profil Diri Anda</h1>
        <div class="container my-5">
            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Bidang pelatihan</label>
                    <input type="text" name="bidang_pelatihan" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                    <input type="text" name="location" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Foto Kartu siswa</label>
                    <input type="file" name="student_card_photo" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Foto KTP</label>
                    <input type="file" name="ktp_photo" class="form-control" id="exampleFormControlInput1">
                </div>

                <button type="submit" class="btn btn-primary mt-5">Lengkapi Biodata</button>
        <a href="{{ route('datamurid') }}" class="btn btn-secondary mt-5">Kembali</a>
            </form>
        </div>
    </main>
@endsection