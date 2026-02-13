<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form Groom</h2>
    <form action="{{ route('groom.store') }}" method="POST">
        @csrf

        <input type="hidden" name="groom[pengantin]" value="pria">

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="groom[nama_lengkap]"><br><br>

        <label for="nama_panggilan">Nama Panggilan</label>
        <input type="text" id="nama_panggilan" name="groom[nama_panggilan]"><br><br>

        <label for="alamat">Alamat</label>
        <textarea name="groom[alamat]" id="alamat"></textarea> <br><br>

        <label for="nama_ayah">Nama Ayah</label>
        <input type="text" id="nama_ayah" name="groom[nama_ayah]"><br><br>

        <label for="nama_ibu">Nama ibu</label>
        <input type="text" id="nama_ibu" name="groom[nama_ibu]"><br><br>

        <label for="anak_ke">anak_ke</label>
        <input type="number" id="anak_ke" name="groom[anak_ke]"><br><br>

        <label for="nama_kakak">Nama kakak</label>
        <input type="text" id="nama_kakak" name="groom[nama_kakak]"><br><br>

        <label for="nama_adik">Nama adik</label>
        <input type="text" id="nama_adik" name="groom[nama_adik]"><br><br>

        <button type="submit">Next</button>
    </form>
</body>
</html>