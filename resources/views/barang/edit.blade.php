@extends('layouts.app')
@section('title', 'Edit Barang')

@section('content')
<h3>Edit Barang</h3>
<form method="POST" action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $barang->stok }}" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control" required>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
