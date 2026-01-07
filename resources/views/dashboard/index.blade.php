@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-12 text-center mb-4">
    <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-4">
       <div class="card text-white" style="background-color: #0b07f6ff; padding: 25px; border-radius: 12px;">
        <h5>Total Barang</h5>
        <h3>{{ $totalBarang }}</h3>
      </div>
    </div>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-4">
      <div class="card text-white" style="background-color: #f406d0ff; padding: 25px; border-radius: 12px;">
        <h5>Total Kategori</h5>
        <h3>{{ $totalKategori }}</h3>
      </div>
    </div>
  </div>
</div>
@endsection
