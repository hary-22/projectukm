@extends('layouts.app')

@section('title', 'Tambah Kategori')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/kategori.css') }}">
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="page-header mb-3">
            <div>
                <h2 class="page-title"><i class="bi bi-plus-circle-fill text-success"></i> Tambah Kategori Baru</h2>
                <p class="page-subtitle">Buat kelompok jenis barang inventaris baru</p>
            </div>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-modern">
            <div class="card-body">
                <form method="POST" action="{{ route('kategori.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}" placeholder="Contoh: Elektronik, Olahraga, Furnitur" required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" placeholder="Keterangan singkat mengenai kategori ini...">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/kategori.js') }}"></script>
@endpush
