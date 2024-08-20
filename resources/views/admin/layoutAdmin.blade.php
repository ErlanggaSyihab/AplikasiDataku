<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Halaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Pastikan penulisan asset benar -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/cssbootstrap.css') }}">
</head>
<body>
        <!-- Konten Utama -->
        <div class="content">
            <h1 class="text-center">@yield('judul', 'Default judul')</h1>
            <hr>
            @yield('konten')
        </div>
    </div>
</body>
</html>
