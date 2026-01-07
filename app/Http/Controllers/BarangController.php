<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('uploads/barang', 'public');
        }

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($barang->gambar) Storage::disk('public')->delete($barang->gambar);
            $validated['gambar'] = $request->file('gambar')->store('uploads/barang', 'public');
        }

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        if ($barang->gambar) Storage::disk('public')->delete($barang->gambar);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
