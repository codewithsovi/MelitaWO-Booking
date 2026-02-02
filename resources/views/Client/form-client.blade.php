<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>form klien</h2>
    <form action="{{ route('client.store') }}" method="POST">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" name="nama_client" id="nama_client">
        <label for="email">email</label>
        <input type="email" name="email" id="email">
        <label for="phone">phone</label>
        <input type="text" name="phone" id="phone">
        <label for="alamat">alamat</label>
        <textarea name="alamat" id="alamat"></textarea>
        <label for="package_id">Package</label>
        <select name="package_id" id="package_id">
            <option value="" disabled selected>Pilih Paket</option>
            @foreach ($packages as $package)
                <option value="{{ $package->id }}">{{ $package->jenis}}</option>
            @endforeach
        </select>
        <button type="submit">next</button>
    </form>
</body>
</html>`