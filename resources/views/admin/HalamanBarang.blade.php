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
        /* tampilan hasil jumlah lingkaran */
        
        .quick-count-circle {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #adccee;
            color: white;
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto; /* Center the circle horizontally */
        }
        .quick-count-container {
            text-align: center;
        }
        .quick-count-text {
            margin-top: 10px; /* Space between circle and text */
        }

    </style>
</head>
<body class="bg-gray-200">
    {{-- Awak navbar --}}
    
    <nav class="navbar navbar-expand-lg navbar-custom bg-gray-200">
        <div class="container-fluid">
            <a class="navbar-brand mb-2" href="#"><img src="{{ asset('img/DatakuLogo.png') }}" alt="Logo" width="220px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('admin.Tambah') }}">
                            <button type="button" class="btn btn-success">Tambah</button>
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
        
       <div class="flex-grow-1 p-3">
    <div class="mb-6">
        <div class="overflow-x-auto">
            <table class="min-w-full border-separate border border-gray-300">
                <thead class="bg-green-900 text-white">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">Nomor</th>
                        <th class="px-4 py-2 border border-gray-300">Nama Barang</th>
                        <th class="px-4 py-2 border border-gray-300">Tanggal Masuk Barang</th>
                        <th class="px-4 py-2 border border-gray-300">Jenis Barang</th>
                        <th class="px-4 py-2 border border-gray-300">Lokasi</th>
                        <th class="px-4 py-2 border border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $no => $data)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $no + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->nama_barang }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->tanggal_masuk_barang }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->jenis_barang }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->lokasi }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admin.edit', $data->id) }}" class="btn btn-warning text-white bg-yellow-500 hover:bg-yellow-600 px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('admin.delete', $data->id) }}" method="post" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white bg-red-500 hover:bg-red-600 px-2 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Tambahkan tabel lain di sini jika diperlukan -->
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
    <div class="container mt-4">
        <div class="quick-count-container">
            <div class="quick-count-circle">
                {{ $totalData }}
            </div>
            <div class="quick-count-text">
                <p class="mb-0">Jumlah total data yang telah diinput adalah:</p>
            </div>
        </div>
    </div>
    <br>


    <button class="btn btn-primary">
        <a href="{{route('dashboard')}}">kembali</a>
    </button>
</body>
</html>
