<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nilai296;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiNilai296Controller extends Controller
{
    public function index()
    {
        $nilai = Nilai296::all();
        return response()->json($nilai, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|max:10',
            'Semester' => 'required|integer',
            'Tahun_Ajaran' => 'required|max:9',
            'Bukti_Nilai_File' => 'nullable|mimes:pdf,jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('Bukti_Nilai_File')) {
            $path = $request->file('Bukti_Nilai_File')->store('public/files');
            $data['Bukti_Nilai_File'] = $path;
        }

        $nilai = Nilai296::create($data);

        return response()->json($nilai, 201);
    }

    public function show($id)
    {
        $nilai = Nilai296::findOrFail($id);
        return response()->json($nilai, 200);
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai296::findOrFail($id);

        $request->validate([
            'NIM' => 'required|max:10',
            'Semester' => 'required|integer',
            'Tahun_Ajaran' => 'required|max:9',
            'Bukti_Nilai_File' => 'nullable|mimes:pdf,jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('Bukti_Nilai_File')) {
            if ($nilai->Bukti_Nilai_File) {
                Storage::delete($nilai->Bukti_Nilai_File);
            }
            $path = $request->file('Bukti_Nilai_File')->store('public/files');
            $data['Bukti_Nilai_File'] = $path;
        }

        $nilai->update($data);

        return response()->json($nilai, 200);
    }

    public function destroy($id)
    {
        $nilai = Nilai296::findOrFail($id);

        if ($nilai->Bukti_Nilai_File) {
            Storage::delete($nilai->Bukti_Nilai_File);
        }

        $nilai->delete();

        return response()->json(['message' => 'Nilai berhasil dihapus.'], 200);
    }
}
