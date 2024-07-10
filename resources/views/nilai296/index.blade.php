@extends('layouts.app')

@section('title', 'Daftar Nilai')

@section('content')
    <h1>Daftar Nilai</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('nilai296.create') }}" class="btn btn-primary mb-3">Tambah Nilai</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th>Bukti Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilai as $n)
                <tr>
                    <td>{{ $n->NIM }}</td>
                    <td>{{ $n->Semester }}</td>
                    <td>{{ $n->Tahun_Ajaran }}</td>
                    <td>
                        @if($n->Bukti_Nilai_File)
                            <a href="{{ Storage::url($n->Bukti_Nilai_File) }}" target="_blank">Lihat Bukti</a>
                        @else
                            Tidak ada file
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('nilai296.show', $n) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('nilai296.edit', $n) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('nilai296.destroy', $n) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection