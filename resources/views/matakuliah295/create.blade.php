@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
    <h1>Tambah Mata Kuliah</h1>
    <form action="{{ route('matakuliah295.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Kode_MK" class="form-label">Kode MK</label>
            <input type="text" class="form-control @error('Kode_MK') is-invalid @enderror" id="Kode_MK" name="Kode_MK" value="{{ old('Kode_MK') }}" required>
            @error('Kode_MK')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Nama_MK" class="form-label">Nama MK</label>
            <input type="text" class="form-control @error('Nama_MK') is-invalid @enderror" id="Nama_MK" name="Nama_MK" value="{{ old('Nama_MK') }}" required>
            @error('Nama_MK')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="SKS" class="form-label">SKS</label>
            <input type="number" class="form-control @error('SKS') is-invalid @enderror" id="SKS" name="SKS" value="{{ old('SKS') }}" required>
            @error('SKS')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control @error('Jurusan') is-invalid @enderror" id="Jurusan" name="Jurusan" value="{{ old('Jurusan') }}" required>
            @error('Jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('Deskripsi') is-invalid @enderror" id="Deskripsi" name="Deskripsi">{{ old('Deskripsi') }}</textarea>
            @error('Deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Silabus_File" class="form-label">Silabus File</label>
            <input type="file" class="form-control @error('Silabus_File') is-invalid @enderror" id="Silabus_File" name="Silabus_File">
            @error('Silabus_File')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection