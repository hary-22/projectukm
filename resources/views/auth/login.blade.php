@extends('layouts.app')

@section('title', 'Login')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
@endpush

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-card-header">
            <div class="auth-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h3 class="auth-title">Masuk ke Akun</h3>
            <p class="auth-subtitle">Silakan masukkan email dan password Anda</p>
        </div>

        <div class="auth-card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label" for="email">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="password">Password</label>
                    <div class="password-wrapper">
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-key"></i></span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <button type="button" class="password-toggle-btn" data-target="password" aria-label="Lihat Password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk Sekarang
                </button>
            </form>

            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/auth.js') }}"></script>
@endpush
