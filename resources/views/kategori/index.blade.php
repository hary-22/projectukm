@extends('layouts.app')
@section('title', 'Data Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Kategori</h3>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kategoris as $kategori)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>{{ $kategori->deskripsi }}</td>
            <td class="text-center">
                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">Belum ada data kategori.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $kategoris->links() }}
@endsection
