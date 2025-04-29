<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Obat;
use App\Models\periksa;

class PasienController extends Controller
{
    public function pasien()
    {
        $pasiens = User::all();
        return view('layouts.pemeriksaan', compact('pasiens'));
    }

    public function edit($id)
    {
        $periksa = Periksa::with(['pasien', 'dokter', 'detailPeriksa.obat'])->findOrFail($id);
        $obats = Obat::all();

        // Hitung total harga awal
        $totalHargaObat = $periksa->detailPeriksa->sum(function ($detail) {
            return $detail->obat->harga * $detail->jumlah;
        });

        $totalHarga = $totalHargaObat + $periksa->biaya_periksa;

        return view('layouts.edit_periksa', compact('periksa', 'obats', 'totalHarga'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'catatan' => 'required|string',
            'obat_ids' => 'required|array',
            'total_harga' => 'required|numeric',
        ]);

        $periksa = Periksa::findOrFail($id);

        $periksa->tgl_periksa = $request->tanggal;
        $periksa->catatan = $request->catatan;
        $periksa->biaya_periksa = $request->total_harga; // Simpan total harga di kolom ini (atau kolom lain sesuai struktur Anda)

        $periksa->save();

        // Sinkronisasi relasi obat (pastikan relasi many-to-many sudah didefinisikan di model)
        $periksa->obats()->sync($request->obat_ids);

        return redirect()->route('pasien.index')->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }
}
