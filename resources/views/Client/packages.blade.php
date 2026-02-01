<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Daftar Paket</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Jenis Paket</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
            <tr>
                @foreach($packages as $package)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $package->jenis }}</td>
                <td>{{ $package->deskripsi }}</td>
                <td>{{ $package->harga }}</td>
            </tr>
            @endforeach
        </table>
</body>
</html>