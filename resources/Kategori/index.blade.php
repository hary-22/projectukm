@extends('layout')

@section('title', 'Data Kategori')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>🗂 Data Kategori</h3>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kategoris as $index => $kategori)
        <tr>
            <td>{{ $index + $kategoris->firstItem() }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>
                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus kategori ini?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-center">Belum ada data kategori</td></tr>
        @endforelse
    </tbody>
</table>

{{ $kategoris->links() }}
@endsection
