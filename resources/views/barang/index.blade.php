@extends('layouts.app')

@section('title', 'Data Barang')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang.css') }}">
@endpush

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title"><i class="bi bi-boxes text-primary"></i> Data Barang</h2>
        <p class="page-subtitle">Daftar seluruh fasilitas dan aset barang UKM</p>
    </div>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Barang
    </a>
</div>

<div class="table-responsive shadow-sm">
    <table class="table table-modern align-middle">
        <thead>
            <tr>
                <th class="text-center" style="width: 60px;">No</th>
                <th style="width: 80px;">Foto</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th class="text-center">Stok</th>
                <th>Harga Satuan</th>
                <th class="text-center" style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $index => $barang)
            <tr>
                <td class="text-center fw-semibold text-muted">
                    {{ $index + $barangs->firstItem() }}
                </td>
                <td>
                    @if($barang->gambar)
                        <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama_barang }}" class="barang-thumb">
                    @else
                        <div class="no-image-placeholder" title="Tidak ada foto">
                            <i class="bi bi-image text-muted"></i>
                        </div>
                    @endif
                </td>
                <td>
                    <div class="fw-bold text-dark">{{ $barang->nama_barang }}</div>
                </td>
                <td>
                    <span class="badge-kategori">
                        <i class="bi bi-tag-fill me-1 text-primary"></i>
                        {{ $barang->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                    </span>
                </td>
                <td class="text-center">
                    @if($barang->stok > 5)
                        <span class="badge-stok tersedia">{{ $barang->stok }} Tersedia</span>
                    @elseif($barang->stok > 0)
                        <span class="badge-stok menipis">{{ $barang->stok }} Menipis</span>
                    @else
                        <span class="badge-stok habis">Habis (0)</span>
                    @endif
                </td>
                <td class="fw-semibold text-dark">
                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-outline-primary btn-sm" title="Edit Data">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline form-delete-barang" data-nama="{{ $barang->nama_barang }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus Barang">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                        Belum ada data barang. Silakan klik <strong>+ Tambah Barang</strong> untuk menambahkan data.
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3 d-flex justify-content-end">
    {{ $barangs->links() }}
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/barang.js') }}"></script>
@endpush
