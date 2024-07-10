@extends('layouts.app')

@section('title', 'Tambah Nilai')

@section('content')
    <h1>Tambah Nilai</h1>
    <form action="{{ route('nilai296.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" value="{{ old('NIM') }}" required>
            @error('NIM')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Semester" class="form-label">Semester</label>
            <input type="number" class="form-control @error('Semester') is-invalid @enderror" id="Semester" name="Semester" value="{{ old('Semester') }}" required>
            @error('Semester')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Tahun_Ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control @error('Tahun_Ajaran') is-invalid @enderror" id="Tahun_Ajaran" name="Tahun_Ajaran" value="{{ old('Tahun_Ajaran') }}" required>
            @error('Tahun_Ajaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Bukti_Nilai_File" class="form-label">Bukti Nilai File</label>
            <input type="file" class="form-control @error('Bukti_Nilai_File') is-invalid @enderror" id="Bukti_Nilai_File" name="Bukti_Nilai_File">
            @error('Bukti_Nilai_File')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection