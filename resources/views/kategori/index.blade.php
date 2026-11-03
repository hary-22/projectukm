@extends('layouts.app')

@section('title', 'Data Kategori')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/kategori.css') }}">
@endpush

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title"><i class="bi bi-tags text-success"></i> Data Kategori</h2>
        <p class="page-subtitle">Kelola pengelompokan jenis fasilitas dan aset inventaris</p>
    </div>
    <a href="{{ route('kategori.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg"></i> Tambah Kategori
    </a>
</div>

<div class="table-responsive shadow-sm">
    <table class="table table-modern align-middle">
        <thead>
            <tr>
                <th class="text-center" style="width: 60px;">No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th class="text-center" style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoris as $index => $kategori)
            <tr>
                <td class="text-center fw-semibold text-muted">
                    {{ $index + $kategoris->firstItem() }}
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="kategori-icon-box">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <div class="kategori-name">{{ $kategori->nama_kategori }}</div>
                    </div>
                </td>
                <td>
                    <div class="kategori-deskripsi">
                        {{ $kategori->deskripsi ?: '-' }}
                    </div>
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-outline-primary btn-sm" title="Edit Kategori">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline form-delete-kategori" data-nama="{{ $kategori->nama_kategori }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus Kategori">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-tag fs-1 d-block mb-2 text-secondary"></i>
                        Belum ada kategori yang ditambahkan. Silakan klik <strong>+ Tambah Kategori</strong>.
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3 d-flex justify-content-end">
    {{ $kategoris->links() }}
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/kategori.js') }}"></script>
@endpush
