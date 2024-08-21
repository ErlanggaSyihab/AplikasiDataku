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
    <!-- Pastikan penulisan asset benar -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/cssbootstrap.css') }}">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .container-fluid {
            height: 100%;
            display: flex;
            flex-direction: row;
        }
        .navbar {
            flex-shrink: 0;
            margin-right: 15px; 
        }
        .content {
            flex-grow: 1;
            padding: 15px;
        }
        /* Styling untuk card dengan ukuran yang lebih besar */
        .card {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 500px; /* Maksimal lebar card */
            height: 250px; /* Tinggi card */
            border: 1px solid #cac6c6;
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card-img-top {
            width: 40%; /* Lebar gambar card */
            height: 100%; /* Tinggi gambar mengikuti tinggi card */
            object-fit: cover; /* Memastikan gambar mengisi area tanpa mengubah rasio aspek */
        }
        .card-body {
            flex: 1;
            padding: 1rem; /* Padding card-body */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-body h5 {
            font-size: 1.25rem; /* Ukuran font judul */
            margin-bottom: 0.5rem;
        }
        .card-body p {
            font-size: 1rem; /* Ukuran font teks */
            margin-bottom: 0.5rem;
            flex-grow: 1;
        }
        /* Styling untuk tombol di card */
        .card .btn {
            font-size: 0.875rem; /* Ukuran font tombol */
            padding: 0.5rem 1rem; /* Padding tombol */
        }
        /* Atur layout grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem; /* Jarak antar card */
        }
        .col-md-6 {
            flex: 1 1 48%; /* 2 card per baris */
            max-width: 48%; /* Maksimal lebar kolom */
        }
        /* Menjaga card berada di tengah */
        .d-flex {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
    </style>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</head>
<body class="bg-gray-200">
    {{-- Awak navbar --}}
    <nav class="navbar navbar-expand-lg navbar-custom bg-gray-200 sticky-top border-b border-gray-300">
        <div class="container-fluid">
            <a class="navbar-brand mb-2" href="#"><img src="{{ asset('img/DatakuLogo.png') }}" alt="Logo" width="220px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- kembali ke home --}}
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('img/home.png') }}" alt="Home">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('admin.Tambah') }}">
                            <button type="button" class="btn text-white bg-gray-500 hover:bg-blue-900 px-2 py-1 rounded">Tambah</button>
                        </a>
                    </li>
                </ul>
                <div class="ms-3">
                    <form class="d-flex" role="search" method="GET" action="{{ route('admin.search') }}">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search by Name, Type, or Date" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>                  
                </div>
            </div>
        </div>
    </nav>
    <hr></hr>
    
    <!-- Konten Utama -->
    <div class="container">
        <div class="row">
            @foreach ($admin as $no => $data)
            <div class="col-md-6 mb-4 d-flex justify-content-center mt-10">
                <div class="card">
                    <img src="{{ asset($data->gambar ? 'images/' . $data->gambar : 'images/default.png') }}" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h5 class="card-title">Lokasi: {{ $data->lokasi }}</h5>
                        <p class="card-text">
                            <strong>Posisi:</strong> {{ $data->posisi }}<br>
                            <strong>Merk Barang:</strong> {{ $data->merk_barang }}<br>
                            <strong>Type Barang:</strong> {{ $data->type_barang }}<br>
                            <strong>Jumlah Barang:</strong> {{ $data->jumlah_barang }}<br>
                            <strong>Tanggal Masuk Barang:</strong> {{ $data->tanggal_masuk_barang }}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.edit', $data->id) }}" class="btn btn-warning text-white bg-yellow-300 hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('admin.delete', $data->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-white bg-red-400 hover:bg-gray-500">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- cetak to pdf dan exel --}}
    <div class="d-flex justify-content-end">
        <a href="" class="me-2">
            <button type="button" class="btn btn-danger">PDF</button>
        </a>
        <a href="">
            <button type="button" class="btn btn-success">Excel</button>
        </a>
    </div>    

    {{-- Menampilkan jumlah data secara keseluruhan --}}
    <h1 class="font-bold text-2xl">
        Jumlah data Keseluruhan adalah : {{ $totalData }}
    </h1>
</body>
</html>
