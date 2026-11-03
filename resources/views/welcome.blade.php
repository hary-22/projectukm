@extends('layouts.app')

@section('title', 'Selamat Datang')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/welcome.css') }}">
@endpush

@section('content')
<div class="hero-section">
    <div class="hero-badge">
        <i class="bi bi-shield-check"></i> Sistem Informasi Terpadu
    </div>
    <h1 class="hero-title">
        Kelola Fasilitas & Barang UKM <span>Lebih Praktis</span>
    </h1>
    <p class="hero-subtitle">
        Platform manajemen inventaris fasilitas UKM yang mudah digunakan. Catat data barang, pantau ketersediaan stok, dan atur kategori dengan cepat.
    </p>

    <div class="hero-actions">
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right"></i> Masuk Sekarang
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">
                <i class="bi bi-person-plus"></i> Buat Akun Baru
            </a>
        @else
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-speedometer2"></i> Buka Dashboard
            </a>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary btn-lg">
                <i class="bi bi-boxes"></i> Lihat Data Barang
            </a>
        @endguest
    </div>

    <!-- Features Overview -->
    <div class="row feature-grid g-4">
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon-wrapper">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h5 class="fw-bold mb-2">Manajemen Barang</h5>
                <p class="text-muted mb-0">Pencatatan lengkap nama barang, kategori, harga, jumlah stok, hingga unggah foto barang.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon-wrapper">
                    <i class="bi bi-tags"></i>
                </div>
                <h5 class="fw-bold mb-2">Klasifikasi Kategori</h5>
                <p class="text-muted mb-0">Pengelompokan barang berdasarkan kategori untuk memudahkan pencarian dan inventarisasi.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon-wrapper">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h5 class="fw-bold mb-2">Hak Akses Fleksibel</h5>
                <p class="text-muted mb-0">Proteksi hak akses berbasis peran (Admin & User) demi menjaga keamanan data fasilitas.</p>
            </div>
        </div>
    </div>
</div>
@endsection
