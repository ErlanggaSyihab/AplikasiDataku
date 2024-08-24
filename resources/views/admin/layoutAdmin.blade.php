<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Halaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/cssbootstrap.css') }}">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4 sticky-top">
        <div class="container">
            <a class="navbar-brand mb-2" href="#"><img src="{{ asset('img/DatakuLogo.png') }}" alt="Logo" width="220px"></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown Action -->
                    <li class="nav-item dropdown">
                        <div class="nav-link dropdown-toggle px-3 py-1 rounded-lg text-gray-900 bg-white border border-gray-200" id="actionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Home</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.HalamanBarang') }}">Halaman Barang</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="content container">
        <p class=" font-bold fs-4 fw-bold" href="#">@yield('judul','default judul')</p>
        @yield('konten')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




        {{-- <h1 class="text-center">@yield('judul', 'Default judul')</h1>
        <hr> --}}