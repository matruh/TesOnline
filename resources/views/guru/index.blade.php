@extends('layouts.app')

@section('title', 'Data Profil Murid')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Profil Guru</h2>
<a href="/profilguru">lengkapi profil</a>
    @if ($gurus->count() > 0)
        <div class="row">
            @foreach ($gurus as $m)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            {{ $m->name }}
                        </div>
                        <div class="card-body">
                            <p><strong>Bidang Pelatihan:</strong> {{ $m->bidang_pelatihan ?? '-' }}</p>
                            <p><strong>Lokasi:</strong> {{ $m->location ?? '-' }}</p>
                            
                            @if($m->certificate_photo)
                                <p><strong>poto certificate:</strong></p>
                                <img src="{{ asset('fotodata/' . $m->certificate_photo) }}" alt="Kartu Pelajar" class="img-fluid mb-2 rounded" style="max-height: 150px;">
                            @endif

                            @if($m->profile_photo)
                                <p><strong>Profil Kartu Pelajar:</strong></p>
                                <img src="{{ asset('fotodata/' . $m->profile_photo) }}" alt="Kartu Pelajar" class="img-fluid mb-2 rounded" style="max-height: 150px;">
                            @endif

                            @if($m->ktp_photo)
                                <p><strong>KTP:</strong></p>
                                <img src="{{ asset('fotodata/' . $m->ktp_photo) }}" alt="KTP" class="img-fluid rounded" style="max-height: 150px;">
                            @endif
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
