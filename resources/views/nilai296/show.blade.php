@extends('layouts.app')

@section('title', 'Detail Nilai')

@section('content')
    <h1>Detail Nilai</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">NIM: {{ $nilai296->NIM }}</h5>
            <p class="card-text"><strong>Semester:</strong> {{ $nilai296->Semester }}</p>
            <p class="card-text"><strong>Tahun Ajaran:</strong> {{ $nilai296->Tahun_Ajaran }}</p>
            @if($nilai296->Bukti_Nilai_File)
                <p class="card-text"><strong>Bukti Nilai:</strong> <a href="{{ Storage::url($nilai296->Bukti_Nilai_File) }}" target="_blank">Lihat Bukti</a></p>
            @else
                <p class="card-text"><strong>Bukti Nilai:</strong> Tidak ada file</p>
            @endif
        </div>
    </div>
    <a href="{{ route('nilai296.edit', $nilai296) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('nilai296.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection