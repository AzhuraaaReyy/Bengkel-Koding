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
        // Ambil dokter yang sedang login
        $dokter = auth()->user(); // Mendapatkan data user yang sedang login

        // Pastikan yang login adalah dokter
        if ($dokter->role !== 'dokter') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses sebagai dokter.');
        }

        // Ambil semua pemeriksaan yang dilakukan oleh dokter yang sedang login
        $periksas = Periksa::with(['pasien', 'dokter'])
            ->where('id_dokter', $dokter->id)  // Mengambil pemeriksaan berdasarkan id dokter yang login
            ->get();

        return view('layouts.pemeriksaan', compact('periksas'));
    }





    public function edit($id)
    {
        // Pastikan ambil data periksa beserta relasinya
        $periksa = Periksa::with(['pasien', 'dokter', 'detailPeriksa.obat'])->findOrFail($id);
        $obats = Obat::all();

        // Biaya pemeriksaan
        $biayaPeriksa = $periksa->biaya_periksa ?? 0;

        // Hitung total harga obat
        $totalHargaObat = 0;
        foreach ($periksa->detailPeriksa as $detail) {
            if ($detail->obat) {
                $totalHargaObat += $detail->obat->harga;
            }
        }

        // Total harga = biaya periksa + total harga obat
        $totalHarga = $biayaPeriksa + $totalHargaObat;
        // Siapkan array ID obat yang dipilih untuk pre-select di form
        $selectedObatIds = [];
        foreach ($periksa->detailPeriksa as $detail) {
            if ($detail->obat) {
                $selectedObatIds[] = $detail->obat->id;
            }
        }

        return view('layouts.edit_periksa', compact('periksa', 'obats', 'totalHarga'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'catatan' => 'required|string',
            'obat_ids' => 'required|array',
            'totalHarga' => 'required|numeric',
        ]);

        $periksa = Periksa::findOrFail($id);

        $periksa->tgl_periksa = $request->tanggal;
        $periksa->catatan = $request->catatan;
        $periksa->biaya_periksa = $request->totalHarga; // Simpan total harga di kolom ini (atau kolom lain sesuai struktur Anda)
        $periksa->status = 'Diperiksa';


        $periksa->save();

        // Sinkronisasi relasi obat (pastikan relasi many-to-many sudah didefinisikan di model)
        $periksa->obats()->sync($request->obat_ids);

        return redirect()->route('pasien.index')->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }
}
