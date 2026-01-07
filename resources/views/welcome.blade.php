@extends('layouts.app')
@section('title', 'Selamat Datang')

@section('content')
<div class="text-center mt-5">
    <h1 class="mb-3">INVENTORY FASILITAS UKM </h1>
    <p class="lead">Silahkan melakukan login.</p>

    @guest
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Masuk</a>
        <a href="{{ route('register') }}" class="btn btn-success btn-lg">Daftar</a>
    @else
        <a href="{{ route('dashboard') }}" class="btn btn-info btn-lg">Masuk ke Dashboard</a>
    @endguest
</div>
@endsection
