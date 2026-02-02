<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form Event</h2>
    <form action="{{ route('event.store') }}" method="POST">
        @csrf

        <label for="tanggal_acara">Tanggal Acara</label>
        <input type="date" id="tanggal_acara" name="tanggal_acara"><br><br>

        <label for="waktu_acara">waktu Acara</label>
        <input type="time" id="waktu_acara" name="waktu_acara"><br><br>

        <label for="lokasi_acara">lokasi Acara</label>
       <textarea name="lokasi_acara" id="lokasi_acara"></textarea><br><br>

       <label for="catatan_tambahan">Catatan Tambahan</label>
       <textarea name="catatan_tambahan" id="catatan_tambahan"></textarea> <br><br>

        <button type="submit">Next</button>
    </form>
</body>
</html>