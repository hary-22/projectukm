<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Beranda') - {{ config('app.name', 'Inventory UKM') }}</title>

    <!-- Bootstrap 5.3 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Global Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- CSS Khusus Per Halaman -->
    @stack('styles')
</head>
<body>
    @include('layouts.navbar')

    <main class="main-content">
        <div class="container mt-4">
            @include('components.alert')
            @yield('content')
        </div>
    </main>

    @include('layouts.footer')

    <!-- Bootstrap 5.3 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Global Script -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- JS Khusus Per Halaman -->
    @stack('scripts')
</body>
</html>
