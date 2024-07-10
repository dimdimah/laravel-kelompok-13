@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('content')
    <h1>Edit Nilai</h1>
    <form action="{{ route('nilai296.update', $nilai296) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" value="{{ old('NIM', $nilai296->NIM) }}" required>
            @error('NIM')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Semester" class="form-label">Semester</label>
            <input type="number" class="form-control @error('Semester') is-invalid @enderror" id="Semester" name="Semester" value="{{ old('Semester', $nilai296->Semester) }}" required>
            @error('Semester')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Tahun_Ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control @error('Tahun_Ajaran') is-invalid @enderror" id="Tahun_Ajaran" name="Tahun_Ajaran" value="{{ old('Tahun_Ajaran', $nilai296->Tahun_Ajaran) }}" required>
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
            @if($nilai296->Bukti_Nilai_File)
                <p class="mt-2">File saat ini: <a href="{{ Storage::url($nilai296->Bukti_Nilai_File) }}" target="_blank">Lihat Bukti</a></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection