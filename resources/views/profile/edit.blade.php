@extends('layouts.app')
@section('title', 'Edit Profil')

@section('content')
<h3>Edit Profil Saya</h3>
<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control">
        <small class="text-muted">Isi jika ingin mengubah password.</small>
    </div>

    <div class="mb-3">
        <label>Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>
@endsection
