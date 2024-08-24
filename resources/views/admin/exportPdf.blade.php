<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .summary {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Ini adalah Data dari Halaman Barang</h1>
    
    <!-- Summary section -->
    <div class="summary">
        <p><strong>Total Jumlah Barang Keseluruhan:</strong> {{ $totalData }}</p>
        <p><strong>Total Jumlah Barang Minggu Ini:</strong> {{ $weeklyData }}</p>
    </div>

    <!-- Data table -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Posisi</th>
                <th>Lokasi</th>
                <th>Merk Barang</th>
                <th>Type Barang</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Masuk Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $no => $data)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $data->posisi }}</td>
                <td>{{ $data->lokasi }}</td>
                <td>{{ $data->merk_barang }}</td>
                <td>{{ $data->type_barang }}</td>
                <td>{{ $data->jumlah_barang }}</td>
                <td>{{ $data->tanggal_masuk_barang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
