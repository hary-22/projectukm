@extends('layouts.app')

@section('title', 'Daftar Akun')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
@endpush

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="auth-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>
            <h3 class="auth-title">Daftar Akun Baru</h3>
            <p class="auth-subtitle">Buat akun untuk mengakses inventaris UKM</p>
        </div>

        <div class="auth-card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label" for="name">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: John Doe" required autofocus>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="email">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@email.com" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="password">Password</label>
                    <div class="password-wrapper">
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-key"></i></span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>
                        <button type="button" class="password-toggle-btn" data-target="password" aria-label="Lihat Password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                    <div class="password-wrapper">
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-shield-check"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        </div>
                        <button type="button" class="password-toggle-btn" data-target="password_confirmation" aria-label="Lihat Password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    <i class="bi bi-person-check-fill"></i> Selesaikan Pendaftaran
                </button>
            </form>

            <div class="auth-footer">
                Sudah memiliki akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/auth.js') }}"></script>
@endpush
