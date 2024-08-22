<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Data</title>
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
    </style>
</head>
<body>
    <h1>Data Admin</h1>
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
