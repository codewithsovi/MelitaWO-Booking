<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Review Booking</h3>

    <h4>Data Klien (penanggung jawab) </h4>
    <p>{{ $booking['client']['nama_client'] ?? '-' }}</p>
    <p>{{ $booking['client']['email'] ?? '-' }}</p>
    <p>{{ $booking['client']['phone'] ?? '-' }}</p>
    <p>{{ $booking['client']['alamat'] ?? '-' }}</p>

    <h4>Data Event</h4>
    <p>{{ $booking['event']['tanggal_acara'] ?? '-'  }}</p>
    <p>{{ $booking['event']['waktu_acara']}}</p>
    <p>{{ $booking['event']['lokasi_acara']}}</p>
    <p>{{ $booking['event']['catatan_tambahan']}}</p>

    <h4>Konsep</h4>
    <p>{{ $booking['concept']['nama_konsep'] ?? '-' }}</p>
    <p>{{ $booking['concept']['deskripsi'] ?? '-' }}</p>
    <p>{{ $booking['concept']['link_referensi'] ?? '-' }}</p>

    <h4>Data Pengantin Pria</h4>
    <p>{{ $booking['groom']['nama_lengkap']}}</p>
    <p>{{ $booking['groom']['nama_panggilan']}}</p>
    <p>{{ $booking['groom']['alamat'] ?? '-' }}</p>
    <p>{{ $booking['groom']['nama_ayah']}}</p>
    <p>{{ $booking['groom']['nama_ibu']}}</p>
    <p>{{ $booking['groom']['anak_ke']}}</p>
    <p>{{ $booking['groom']['nama_kakak']}}</p>
    <p>{{ $booking['groom']['nama_adik']}}</p>

    <h4>Data Pengantin Wanita</h4>
    <p>{{ $booking['bride']['nama_lengkap']}}</p>
    <p>{{ $booking['bride']['nama_panggilan']}}</p>
    <p>{{ $booking['bride']['alamat']}}</p>
    <p>{{ $booking['bride']['nama_ayah']}}</p>
    <p>{{ $booking['bride']['nama_ibu']}}</p>
    <p>{{ $booking['bride']['anak_ke']}}</p>
    <p>{{ $booking['bride']['nama_kakak']}}</p>
    <p>{{ $booking['bride']['nama_adik']}}</p>

    <h4>Vendor</h4>
    @foreach ($booking['vendors'] ?? [] as $vendor)
        <p>{{ $vendor['nama_vendor'] }} - {{ $vendor['kontak'] }}</p>
    @endforeach

   <a href="{{route('edit-data')}}">Edit</a>
   <a href=""></a>
</body>

</html>