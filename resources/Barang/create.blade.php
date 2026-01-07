@extends('layout')

@section('title', 'Tambah Barang')

@section('content')
<h3>Tambah Barang Baru</h3>
<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" min="0" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" min="0" required>
    </div>
    <div class="mb-3">
        <label>Gambar Barang (opsional)</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
