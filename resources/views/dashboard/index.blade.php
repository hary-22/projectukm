@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard.css') }}">
@endpush

@section('content')
<div class="dashboard-welcome">
    <h2>Halo, {{ auth()->user()->name }}! 👋</h2>
    <p>Selamat datang di panel kontrol Inventory Fasilitas UKM. Pantau seluruh aset dan pergerakan stok Anda di sini.</p>
</div>

<!-- Statistik Ringkasan -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card stat-barang">
            <div class="stat-info">
                <div class="stat-label">Total Barang</div>
                <div class="stat-value" data-count="{{ $totalBarang }}">{{ $totalBarang }}</div>
            </div>
            <div class="stat-icon">
                <i class="bi bi-box-seam-fill"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card stat-kategori">
            <div class="stat-info">
                <div class="stat-label">Total Kategori</div>
                <div class="stat-value" data-count="{{ $totalKategori }}">{{ $totalKategori }}</div>
            </div>
            <div class="stat-icon">
                <i class="bi bi-tags-fill"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card stat-user">
            <div class="stat-info">
                <div class="stat-label">Total Pengguna</div>
                <div class="stat-value" data-count="{{ $totalUser }}">{{ $totalUser }}</div>
            </div>
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>
        </div>
    </div>
</div>

<!-- Akses Cepat -->
<div class="card-modern mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span class="fs-6 fw-bold"><i class="bi bi-lightning-charge-fill text-warning me-2"></i>Aksi Cepat</span>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('barang.create') }}" class="quick-action-card">
                    <i class="bi bi-plus-circle text-primary"></i>
                    <div class="fw-semibold">Tambah Barang</div>
                    <small class="text-muted">Input aset baru</small>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('barang.index') }}" class="quick-action-card">
                    <i class="bi bi-boxes text-info"></i>
                    <div class="fw-semibold">Kelola Barang</div>
                    <small class="text-muted">Lihat inventaris</small>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('kategori.index') }}" class="quick-action-card">
                    <i class="bi bi-tags text-success"></i>
                    <div class="fw-semibold">Kelola Kategori</div>
                    <small class="text-muted">Klasifikasi data</small>
                </a>
            </div>
            @if(auth()->user()->role === 'admin')
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('user.index') }}" class="quick-action-card">
                    <i class="bi bi-people text-purple" style="color: #8b5cf6;"></i>
                    <div class="fw-semibold">Manajemen User</div>
                    <small class="text-muted">Akses admin</small>
                </a>
            </div>
            @else
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('profile.edit') }}" class="quick-action-card">
                    <i class="bi bi-person-gear text-secondary"></i>
                    <div class="fw-semibold">Profil Akun</div>
                    <small class="text-muted">Ubah kata sandi</small>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>
@endpush
