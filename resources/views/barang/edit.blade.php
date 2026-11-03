@extends('layouts.app')

@section('title', 'Edit Barang')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/barang.css') }}">
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="page-header mb-3">
            <div>
                <h2 class="page-title"><i class="bi bi-pencil-square text-primary"></i> Edit Data Barang</h2>
                <p class="page-subtitle">Perbarui informasi barang "{{ $barang->nama_barang }}"</p>
            </div>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-modern">
            <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select id="kategori_id" name="kategori_id" class="form-select" required>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ (old('kategori_id', $barang->kategori_id) == $kategori->id) ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label">Jumlah Stok <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" id="stok" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}" min="0" required>
                                <span class="input-group-text">Unit</span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label">Harga Satuan (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" id="harga" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}" min="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Foto / Gambar Barang</label>
                        
                        @if($barang->gambar)
                            <div class="d-block mb-2">
                                <span class="small text-muted d-block mb-1">Foto Saat Ini:</span>
                                <div class="current-image-wrapper">
                                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama_barang }}">
                                </div>
                            </div>
                        @endif

                        <label for="gambarInput" class="form-label small text-muted">
                            {{ $barang->gambar ? 'Ganti Foto (Kosongkan jika tidak ingin mengubah):' : 'Unggah Foto Baru (Opsional):' }}
                        </label>
                        <input type="file" id="gambarInput" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted d-block mt-1">Format: JPG, JPEG, PNG, WEBP (Maks. 2MB)</small>

                        <div id="previewContainer" class="preview-container">
                            <p class="small text-muted mb-1">Pratinjau Foto Baru:</p>
                            <img id="previewImage" src="" alt="Pratinjau Foto Baru" class="preview-image">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-arrow-repeat"></i> Perbarui Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/barang.js') }}"></script>
@endpush
