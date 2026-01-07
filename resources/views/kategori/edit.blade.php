@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<h3>Edit Kategori</h3>
<form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ $kategori->deskripsi }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
