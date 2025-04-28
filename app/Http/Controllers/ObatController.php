<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('layouts.dashboard', compact('obats'));
    }
    public function obat()
    {
        $obats = Obat::all();
        return view('layouts.list_obat', compact('obats'));
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('layouts.edit_obat', compact('obat'));
    }

    public function destroy($id)
    {
        try {
            $obat = Obat::findOrFail($id);
            $obat->delete();

            return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('obat.index')->with('error', 'Data tidak dapat dihapus karena sedang digunakan di tabel lain.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function create()
    {
        return view('layouts.add_obat');
    }
}
