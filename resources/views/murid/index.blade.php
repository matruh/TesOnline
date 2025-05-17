@extends('layouts.app')

@section('title', 'Data Profil Murid')

@section('content')
    <div class="container mt-4">
        {{-- <h2 class="mb-4">Profil Murid</h2> --}}

        {{-- @if ($murid->count() > 0)
            <div class="row">
                @foreach ($murid as $m)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                {{ $m->name }}
                            </div>
                            <div class="card-body">
                                <p><strong>Bidang Pelatihan:</strong> {{ $m->bidang_pelatihan ?? '-' }}</p>
                                <p><strong>Lokasi:</strong> {{ $m->location ?? '-' }}</p>

                                @if ($m->student_card_photo)
                                    <p><strong>Kartu Pelajar:</strong></p>
                                    <img src="{{ asset('fotodata/' . $m->student_card_photo) }}" alt="Kartu Pelajar"
                                        class="img-fluid mb-2 rounded" style="max-height: 150px;">
                                @endif

                                @if ($m->ktp_photo)
                                    <p><strong>KTP:</strong></p>
                                    <img src="{{ asset('fotodata/' . $m->ktp_photo) }}" alt="KTP"
                                        class="img-fluid rounded" style="max-height: 150px;">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Belum ada data murid.</div>
        @endif --}}

        <h2 class="mb-4 mt-5">Daftar Guru</h2>
        <form class="d-flex search-form" role="search" action="/indexmurid" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        @if ($gurus->count() > 0)
            <div class="row">
                @foreach ($gurus as $g)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-success text-white">
                                {{ $g->name }}
                            </div>
                            <div class="card-body">
                                <p><strong>Skill:</strong> {{ $g->skill ?? '-' }}</p>
                                <p><strong>Lokasi:</strong> {{ $g->location ?? '-' }}</p>

                                @if ($g->profile_photo)
                                    <p><strong>Foto Profil:</strong></p>
                                    <img src="{{ asset('fotodata/' . $g->profile_photo) }}" alt="Foto Profil"
                                        class="img-fluid mb-2 rounded" style="max-height: 150px;">
                                @endif

                                @if ($g->certificate_photo)
                                    <p><strong>Sertifikat:</strong></p>
                                    <img src="{{ asset('fotodata/' . $g->certificate_photo) }}" alt="Sertifikat"
                                        class="img-fluid mb-2 rounded" style="max-height: 150px;">
                                @endif

                                @if ($g->ktp_photo)
                                    <p><strong>KTP:</strong></p>
                                    <img src="{{ asset('fotodata/' . $g->ktp_photo) }}" alt="KTP"
                                        class="img-fluid rounded" style="max-height: 150px;">
                                @endif

                                <!-- Contoh tombol pilih guru -->
                                <form method="POST" action="{{ route('kirim.request') }}">
                                    @csrf
                                    <input type="hidden" name="guru_id" value="{{ $g->id }}">
                                    <button type="submit" class="btn btn-primary btn-block mt-3">Pilih Guru Ini</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Belum ada data guru.</div>
        @endif
    </div>
@endsection
