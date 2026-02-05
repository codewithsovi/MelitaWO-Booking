<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form Concept</h2>
    <form action="{{ route('concept.store') }}" method="POST">
        @csrf

        <label for="nama_konsep">Nama konsep</label>
        <input type="text" id="nama_konsep" name="nama_konsep"><br><br>

        <label for="deskripsi">deskripsi</label>
        <textarea name="deskripsi" id="deskripsi"></textarea> <br><br>

        <label for="link_referensi">Link Referensi</label>
        <input type="url" id="link_referensi" name="link_referensi"><br><br>

        <button type="submit">Next</button>
    </form>
</body>
</html>