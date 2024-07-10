<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah295;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Matakuliah295Controller extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah295::all();
        return view('matakuliah295.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah295.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Kode_MK' => 'required|unique:tb_matakuliah295,Kode_MK|max:10',
            'Nama_MK' => 'required|max:100',
            'SKS' => 'required|integer',
            'Jurusan' => 'required|max:50',
            'Deskripsi' => 'nullable',
            'Silabus_File' => 'nullable|mimes:pdf,jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('Silabus_File')) {
            $path = $request->file('Silabus_File')->store('public/files');
            $data['Silabus_File'] = $path;
        }

        Matakuliah295::create($data);

        return redirect()->route('matakuliah295.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }
    public function show(Matakuliah295 $matakuliah295)
    {
        return view('matakuliah295.show', compact('matakuliah295'));
    }

    public function edit(Matakuliah295 $matakuliah295)
    {
        return view('matakuliah295.edit', compact('matakuliah295'));
    }

    public function update(Request $request, Matakuliah295 $matakuliah295)
    {
        $request->validate([
            'Kode_MK' => 'required|max:10|unique:tb_matakuliah295,Kode_MK,' . $matakuliah295->id,
            'Nama_MK' => 'required|max:100',
            'SKS' => 'required|integer',
            'Jurusan' => 'required|max:50',
            'Deskripsi' => 'nullable',
            'Silabus_File' => 'nullable|mimes:pdf,jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('Silabus_File')) {
            if ($matakuliah295->Silabus_File) {
                Storage::delete($matakuliah295->Silabus_File);
            }
            $path = $request->file('Silabus_File')->store('public/files');
            $data['Silabus_File'] = $path;
        }

        $matakuliah295->update($data);

        return redirect()->route('matakuliah295.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(Matakuliah295 $matakuliah295)
    {
        if ($matakuliah295->Silabus_File) {
            Storage::delete($matakuliah295->Silabus_File);
        }

        $matakuliah295->delete();

        return redirect()->route('matakuliah295.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
