@extends('layout')

@section('title', 'Edit Barang')

@section('content')
<h3>Edit Barang</h3>
<form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_id" class="form-select" required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $barang->kategori_id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" min="0" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" min="0" required>
    </div>
    <div class="mb-3">
        <label>Gambar Barang (opsional)</label><br>
        @if($barang->gambar)
            <img src="{{ asset('uploads/'.$barang->gambar) }}" width="80" class="mb-2">
        @endif
        <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
