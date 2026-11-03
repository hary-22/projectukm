@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/user.css') }}">
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="page-header mb-3">
            <div>
                <h2 class="page-title"><i class="bi bi-person-plus-fill text-primary"></i> Tambah Pengguna Baru</h2>
                <p class="page-subtitle">Daftarkan akun pengguna atau administrator baru</p>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-modern form-user-card">
            <div class="card-body">
                <form id="userForm" method="POST" action="{{ route('user.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Admin UKM" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="admin@ukm.ac.id" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Peran (Hak Akses) <span class="text-danger">*</span></label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User (Pengguna Biasa)</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Pengelola Penuh)</option>
                        </select>
                        <small class="text-muted">Admin memiliki hak mengelola data pengguna lain.</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle-fill"></i> Simpan Pengguna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/user.js') }}"></script>
@endpush
