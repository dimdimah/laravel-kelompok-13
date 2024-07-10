@extends('layouts.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
    <h1>Detail Mata Kuliah</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $matakuliah295->Nama_MK }}</h5>
            <p class="card-text"><strong>Kode MK:</strong> {{ $matakuliah295->Kode_MK }}</p>
            <p class="card-text"><strong>SKS:</strong> {{ $matakuliah295->SKS }}</p>
            <p class="card-text"><strong>Jurusan:</strong> {{ $matakuliah295->Jurusan }}</p>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $matakuliah295->Deskripsi }}</p>
            @if($matakuliah295->Silabus_File)
                <p class="card-text"><strong>Silabus File:</strong> <a href="{{ Storage::url($matakuliah295->Silabus_File) }}" target="_blank">Lihat Silabus</a></p>
            @endif
        </div>
    </div>
    <a href="{{ route('matakuliah295.edit', $matakuliah295) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('matakuliah295.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection