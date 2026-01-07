@extends('layout')

@section('title', 'Data Barang')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>📦 Data Barang</h3>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($barangs as $index => $barang)
        <tr>
            <td>{{ $index + $barangs->firstItem() }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
            <td>{{ $barang->stok }}</td>
            <td>Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
            <td>
                @if($barang->gambar)
                    <img src="{{ asset('uploads/'.$barang->gambar) }}" width="60" alt="Gambar Barang">
                @else
                    <span class="text-muted">Tidak ada</span>
                @endif
            </td>
            <td>
                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus barang ini?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">Belum ada data barang</td></tr>
        @endforelse
    </tbody>
</table>

{{ $barangs->links() }}
@endsection
