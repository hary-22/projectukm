@extends('layouts.app')

@section('title', 'Manajemen User')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/user.css') }}">
@endpush

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title"><i class="bi bi-people-fill text-primary"></i> Manajemen Pengguna</h2>
        <p class="page-subtitle">Kelola akun pengguna, peran hak akses, dan kredensial sistem</p>
    </div>
    <a href="{{ route('user.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus-fill"></i> Tambah Pengguna
    </a>
</div>

<div class="table-responsive shadow-sm">
    <table class="table table-modern align-middle">
        <thead>
            <tr>
                <th class="text-center" style="width: 60px;">No</th>
                <th>Pengguna</th>
                <th>Email</th>
                <th class="text-center">Peran (Role)</th>
                <th>Tanggal Terdaftar</th>
                <th class="text-center" style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
            <tr>
                <td class="text-center fw-semibold text-muted">
                    {{ $index + $users->firstItem() }}
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="user-avatar-circle">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="fw-bold text-dark">{{ $user->name }}</div>
                            @if($user->id === auth()->id())
                                <span class="badge bg-secondary" style="font-size: 0.7rem;">Akun Anda</span>
                            @endif
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-muted"><i class="bi bi-envelope me-1"></i>{{ $user->email }}</span>
                </td>
                <td class="text-center">
                    @if($user->role === 'admin')
                        <span class="badge-role-admin"><i class="bi bi-shield-fill-check me-1"></i>ADMIN</span>
                    @else
                        <span class="badge-role-user"><i class="bi bi-person me-1"></i>USER</span>
                    @endif
                </td>
                <td>
                    <span class="text-muted small">{{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}</span>
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-primary btn-sm" title="Edit Akun">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline form-delete-user" data-nama="{{ $user->name }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus Akun">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-people fs-1 d-block mb-2 text-secondary"></i>
                        Belum ada data user selain akun Anda.
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3 d-flex justify-content-end">
    {{ $users->links() }}
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/user.js') }}"></script>
@endpush
