@extends('layouts.app')

@section('title', 'Edit Pengguna')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/user.css') }}">
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="page-header mb-3">
            <div>
                <h2 class="page-title"><i class="bi bi-pencil-square text-primary"></i> Edit Data Pengguna</h2>
                <p class="page-subtitle">Perbarui kredensial atau peran akun "{{ $user->name }}"</p>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-modern form-user-card">
            <div class="card-body">
                <form id="userForm" method="POST" action="{{ route('user.update', $user->id) }}">
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

                    <div class="mb-3">
                        <label for="role" class="form-label">Peran (Hak Akses) <span class="text-danger">*</span></label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User (Pengguna Biasa)</option>
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin (Pengelola Penuh)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru (Opsional)</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                        <small class="text-muted">Isi hanya jika ingin mengganti password pengguna ini.</small>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-arrow-repeat"></i> Perbarui Pengguna
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
