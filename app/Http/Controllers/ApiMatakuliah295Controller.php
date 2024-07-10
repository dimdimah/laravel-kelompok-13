<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah295;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiMatakuliah295Controller extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah295::all();
        return response()->json($matakuliah, 200);
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

        $matakuliah = Matakuliah295::create($data);

        return response()->json($matakuliah, 201);
    }

    public function show($id)
    {
        $matakuliah = Matakuliah295::findOrFail($id);
        return response()->json($matakuliah, 200);
    }

    public function update(Request $request, $id)
    {
        $matakuliah = Matakuliah295::findOrFail($id);

        $request->validate([
            'Kode_MK' => 'required|max:10|unique:tb_matakuliah295,Kode_MK,' . $matakuliah->id,
            'Nama_MK' => 'required|max:100',
            'SKS' => 'required|integer',
            'Jurusan' => 'required|max:50',
            'Deskripsi' => 'nullable',
            'Silabus_File' => 'nullable|mimes:pdf,jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('Silabus_File')) {
            if ($matakuliah->Silabus_File) {
                Storage::delete($matakuliah->Silabus_File);
            }
            $path = $request->file('Silabus_File')->store('public/files');
            $data['Silabus_File'] = $path;
        }

        $matakuliah->update($data);

        return response()->json($matakuliah, 200);
    }

    public function destroy($id)
    {
        $matakuliah = Matakuliah295::findOrFail($id);

        if ($matakuliah->Silabus_File) {
            Storage::delete($matakuliah->Silabus_File);
        }

        $matakuliah->delete();

        return response()->json(['message' => 'Mata kuliah berhasil dihapus.'], 200);
    }
}
