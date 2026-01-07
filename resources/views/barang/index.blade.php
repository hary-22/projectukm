@extends('layouts.app')
@section('title', 'Data Barang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Barang</h3>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($barangs as $barang)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
            <td class="text-center">{{ $barang->stok }}</td>
            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
            <td class="text-center">
                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center text-muted">Belum ada data barang.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $barangs->links() }}
@endsection
