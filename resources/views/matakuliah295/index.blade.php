@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')
    <h1>Daftar Mata Kuliah</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('matakuliah295.create') }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matakuliah as $mk)
                <tr>
                    <td>{{ $mk->Kode_MK }}</td>
                    <td>{{ $mk->Nama_MK }}</td>
                    <td>{{ $mk->SKS }}</td>
                    <td>{{ $mk->Jurusan }}</td>
                    <td>
                        <a href="{{ route('matakuliah295.show', $mk) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('matakuliah295.edit', $mk) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('matakuliah295.destroy', $mk) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection