@extends('layouts.app')

@section('title', 'Profil Saya')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endpush

@section('content')
<div class="profile-container">
    <div class="profile-header-card">
        <div class="profile-avatar-large">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <h3 class="profile-name">{{ $user->name }}</h3>
        <p class="profile-email">{{ $user->email }}</p>
        <span class="badge {{ $user->role === 'admin' ? 'bg-warning text-dark' : 'bg-primary text-white' }} px-3 py-2 rounded-pill text-uppercase fw-bold">
            <i class="bi bi-shield-check me-1"></i> Peran: {{ $user->role }}
        </span>
    </div>

    <div class="card-modern">
        <div class="card-header">
            <i class="bi bi-person-lines-fill text-primary me-2"></i> Pengaturan Informasi Akun
        </div>
        <div class="card-body">
            <form id="profileForm" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <hr class="my-4">

                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-key-fill text-warning me-2"></i>Ubah Password (Opsional)</h6>

                <div class="mb-3">
                    <label for="new_password" class="form-label">Password Baru</label>
                    <input type="password" id="new_password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                    <small class="text-muted">Minimal 6 karakter jika ingin mengganti.</small>
                </div>

                <div class="mb-4">
                    <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" id="new_password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/profile.js') }}"></script>
@endpush
