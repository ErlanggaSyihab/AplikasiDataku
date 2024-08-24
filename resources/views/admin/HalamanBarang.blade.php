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

        .container-fluid {
            height: 100%;
            display: flex;
            flex-direction: row;
        }
    
        .content {
            flex-grow: 1;
            padding: 15px;
            
        }
        .card {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 500px; /* Maksimal lebar card */
            height: 260px; /* Tinggi card */
            border: 1px solid #cac6c6;
            border-radius: 0.5rem;
            overflow: hidden;
            margin-top:;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card-img-top {
            width: 40%; /* Lebar gambar card */
            height: 100%; /* Tinggi gambar mengikuti tinggi card */
            object-fit: contain; /* Menjaga gambar tidak terpotong */
            background-color: #f8f9fa; /* Warna latar belakang jika gambar tidak mengisi seluruh area */
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
{{-- Awal navbar --}}
<nav class="navbar navbar-expand-lg navbar-custom bg-gray-200 border-b border-gray-300 sticky top-0 z-50">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand mb-2" href="#"><img src="{{ asset('img/DatakuLogo.png') }}" alt="Logo" width="220px"></a>

        <!-- Button Tambah -->
        <div>
            <button class="btn text-white bg-blue-800 hover:bg-green-800 px-3 py-1 rounded-md items-center justify-center ">
                <a href="{{ route('admin.Tambah') }}" class="no-underline text-white text-sm text-center">Tambah</a>
            </button>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
                <!-- Additional Navbar Items if any -->
            </ul>
            
            <!-- Search Form -->
            <div class="d-flex align-items-center ms-auto">
                <form class="d-flex" role="search" method="GET" action="{{ route('admin.search') }}">
                    <input class="form-control px-3 py-1 me-3" type="search" name="search" placeholder="Cari data barang disini" aria-label="Search">
                    <button type="submit" class="btn text-white bg-blue-900 hover:bg-blue-500 px-2 py-1 rounded">Search</button>
                </form>
                
                <!-- Dropdown for Actions -->
                <div class="nav-item dropdown ms-4"> <!-- Reduced margin to move it closer to the search button -->
                    <div class="nav-link dropdown-toggle px-3 py-1 rounded-md text-gray-600 bg-white border border-gray-200" id="actionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </div>                                                                                             
                    <ul class="dropdown-menu" aria-labelledby="actionsDropdown">
                        <li>
                            
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                Profile
                            </a>
                           
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

    
    <!-- Konten Utama -->


    
    <div class="flex flex-col items-center space-y-4 mb-8">
        <!-- Judul di atas -->
        <h1 class="font-bold text-2xl mt-8 mb-1">Halaman Daftar Barang</h1>
        
        <!-- Link Cetak PDF dengan gambar di samping kanan -->
        <a class="flex items-center space-x-2" href="{{ route('admin.exportPdf') }}">
            <img src="{{ asset('img/pdf.png') }}" alt="Cetak PDF" style="width: 30px">
            <p><b>Cetak PDF</b></p>
            
        </a> 
    </div>
    
    <div class="container">
        <div class="row">
            @foreach ($admin as $no => $data)
            <div class="col-md-6  d-flex justify-content-center mt-2">
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
                            <a href="{{ route('admin.edit', $data->id) }}" class="btn text-white bg-blue-900 hover:bg-yellow-400">Edit</a>
                            <form action="{{ route('admin.delete', $data->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-white bg-blue-900 hover:bg-red-500">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>   

    {{-- Menampilkan jumlah data secara keseluruhan --}}
    <h1 class="font-bold text-2xl text-center py-5">
        Jumlah data Keseluruhan adalah : {{ $totalData }}
    </h1>

    <!-- Include Bootstrap JS and Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>


