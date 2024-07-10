<?php

namespace App\Http\Controllers;

use App\Models\Nilai296;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Nilai296Controller extends Controller
{
    public function index()
    {
        $nilai = Nilai296::all();
        return view('nilai296.index', compact('nilai'));
    }

    public function create()
    {
        return view('nilai296.create');
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

        Nilai296::create($data);

        return redirect()->route('nilai296.index')->with('success', 'Nilai berhasil ditambahkan.');
    }
    public function show(Nilai296 $nilai296)
    {
        return view('nilai296.show', compact('nilai296'));
    }

    public function edit(Nilai296 $nilai296)
    {
        return view('nilai296.edit', compact('nilai296'));
    }

    public function update(Request $request, Nilai296 $nilai296)
    {
        $request->validate([
            'NIM' => 'required|max:10',
            'Semester' => 'required|integer',
            'Tahun_Ajaran' => 'required|max:9',
            'Bukti_Nilai_File' => 'nullable|mimes:pdf,jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('Bukti_Nilai_File')) {
            // Hapus file lama jika ada
            if ($nilai296->Bukti_Nilai_File) {
                Storage::delete($nilai296->Bukti_Nilai_File);
            }
            // Simpan file baru
            $path = $request->file('Bukti_Nilai_File')->store('public/files');
            $data['Bukti_Nilai_File'] = $path;
        }

        $nilai296->update($data);

        return redirect()->route('nilai296.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Nilai296 $nilai296)
    {
        if ($nilai296->Bukti_Nilai_File) {
            Storage::delete($nilai296->Bukti_Nilai_File);
        }

        $nilai296->delete();

        return redirect()->route('nilai296.index')->with('success', 'Nilai berhasil dihapus.');
    }
}
