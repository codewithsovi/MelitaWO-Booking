<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Edit data</h2>
    <form action="{{route('update-data')}}" method="POST">
        @csrf
        @method('PUT')

        <h2>Data Client</h2>
        <label for="nama">Nama</label>
        <input type="text" name="client[nama_client]" id="nama_client"
            value="{{ $booking['client']['nama_client'] ?? '-' }}"><br><br>
        <label for="email">email</label>
        <input type="email" name="client[email]" id="email" value="{{ $booking['client']['email'] ?? '-' }}"><br><br>
        <label for="phone">phone</label>
        <input type="text" name="client[phone]" id="phone" value="{{ $booking['client']['phone'] ?? '-' }}"> <br><br>
        <label for="alamat">alamat</label>
        <textarea name="client[alamat]" id="alamat"
            value="{{ $booking['client']['alamat'] ?? '-' }}">{{$booking['client']['alamat']}}</textarea><br><br>
        <label for="package_id">Package</label>

        <select name="paket[package_id]">
            @foreach ($packages as $package)
            <option value="{{ $package->id }}"
                {{ old('event.package_id', $selectedPackageId) == $package->id ? 'selected' : '' }}>
                {{ $package->jenis }}
            </option>
            @endforeach
        </select>


        <h2>Data Event</h2>
        <label for="tanggal_acara">Tanggal Acara</label>
        <input type="date" id="tanggal_acara" name="event[tanggal_acara]"
            value="{{$booking['event']['tanggal_acara']}}"><br><br>

        <label for="waktu_acara">waktu Acara</label>
        <input type="time" id="waktu_acara" name="event[waktu_acara]"
            value="{{$booking['event']['waktu_acara']}}"><br><br>

        <label for="lokasi_acara">lokasi Acara</label>
        <textarea name="event[lokasi_acara]" id="lokasi_acara">{{$booking['event']['lokasi_acara']}}</textarea><br><br>

        <label for="catatan_tambahan">Catatan Tambahan</label>
        <textarea name="event[catatan_tambahan]"
            id="catatan_tambahan">{{$booking['event']['catatan_tambahan'] ?? '-'}}</textarea> <br><br>

        <h2>DATA KONSEP</h2>
        <label for="nama_konsep">Nama konsep</label>
        <input type="text" id="nama_konsep" name="concept[nama_konsep]"
            value="{{ $booking['concept']['nama_konsep']}}"><br><br>

        <label for="deskripsi">deskripsi</label>
        <textarea name="concept[deskripsi]" id="deskripsi">{{ $booking['concept']['deskripsi']}}</textarea> <br><br>

        <label for="link_referensi">Link Referensi</label>
        <input type="url" id="link_referensi" name="concept[link_referensi]"
            value="{{ $booking['concept']['link_referensi']}}"><br><br>

        <h2>GROOM</h2>
        <input type="hidden" name="groom[pengantin]" value="pria">

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="groom[nama_lengkap]"
            value="{{ $booking['groom']['nama_lengkap']}}"><br><br>

        <label for="nama_panggilan">Nama Panggilan</label>
        <input type="text" id="nama_panggilan" name="groom[nama_panggilan]"
            value="{{ $booking['groom']['nama_panggilan']}}"><br><br>

        <label for="alamat">Alamat</label>
        <textarea name="groom[alamat]" id="alamat">{{ $booking['groom']['alamat']}}</textarea> <br><br>

        <label for="nama_ayah">Nama Ayah</label>
        <input type="text" id="nama_ayah" name="groom[nama_ayah]" value="{{ $booking['groom']['nama_ayah']}}"><br><br>

        <label for="nama_ibu">Nama ibu</label>
        <input type="text" id="nama_ibu" name="groom[nama_ibu]" value="{{ $booking['groom']['nama_ibu']}}"><br><br>

        <label for="anak_ke">anak_ke</label>
        <input type="number" id="anak_ke" name="groom[anak_ke]" value="{{ $booking['groom']['anak_ke']}}"><br><br>

        <label for="nama_kakak">Nama kakak</label>
        <input type="text" id="nama_kakak" name="groom[nama_kakak]"
            value="{{ $booking['groom']['nama_kakak'] ?? '-'}}"><br><br>

        <label for="nama_adik">Nama adik</label>
        <input type="text" id="nama_adik" name="groom[nama_adik]"
            value="{{ $booking['groom']['nama_adik']?? '-'}}"><br><br>

        <h2>bride</h2>
        <input type="hidden" name="bride[pengantin]" value="wanita">

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="bride[nama_lengkap]"
            value="{{ $booking['bride']['nama_lengkap']}}"><br><br>

        <label for="nama_panggilan">Nama Panggilan</label>
        <input type="text" id="nama_panggilan" name="bride[nama_panggilan]"
            value="{{ $booking['bride']['nama_panggilan']}}"><br><br>

        <label for="alamat">Alamat</label>
        <textarea name="bride[alamat]" id="alamat">{{ $booking['bride']['alamat']}}</textarea> <br><br>

        <label for="nama_ayah">Nama Ayah</label>
        <input type="text" id="nama_ayah" name="bride[nama_ayah]" value="{{ $booking['bride']['nama_ayah']}}"><br><br>

        <label for="nama_ibu">Nama ibu</label>
        <input type="text" id="nama_ibu" name="bride[nama_ibu]" value="{{ $booking['bride']['nama_ibu']}}"><br><br>

        <label for="anak_ke">anak_ke</label>
        <input type="number" id="anak_ke" name="bride[anak_ke]"
            value="{{ $booking['bride']['anak_ke'] ?? '-'}}"><br><br>

        <label for="nama_kakak">Nama kakak</label>
        <input type="text" id="nama_kakak" name="bride[nama_kakak]"
            value="{{ $booking['bride']['nama_kakak'] ?? '-'}}"><br><br>

        <label for="nama_adik">Nama adik</label>
        <input type="text" id="nama_adik" name="bride[nama_adik]"
            value="{{ $booking['bride']['nama_adik']?? '-'}}"><br><br>


        <h2>Vendor</h2>

        @foreach ($vendors as $vendor)

        @php
        $selected = $selectedVendors->get($vendor->id);
        @endphp

        <div style="margin-bottom:16px;">

            <label>
                <input type="checkbox" class="vendor-checkbox" name="vendors[{{ $vendor->id }}][checked]"
                    data-target="vendor-detail-{{ $vendor->id }}" {{ $selected ? 'checked' : '' }}>
                {{ $vendor->jenis_vendor }}
            </label>

            <div id="vendor-detail-{{ $vendor->id }}" class="vendor-detail"
                style="display: {{ $selected ? 'block' : 'none' }}">

                <input type="hidden" name="vendors[{{ $vendor->id }}][vendor_id]" value="{{ $vendor->id }}">

                <div>
                    <label>Nama Vendor</label><br>
                    <input type="text" name="vendors[{{ $vendor->id }}][nama_vendor]"
                        value="{{ $selected['nama_vendor'] ?? '' }}" placeholder="Nama vendor">
                </div>

                <div>
                    <label>Kontak</label><br>
                    <input type="text" name="vendors[{{ $vendor->id }}][kontak]" value="{{ $selected['kontak'] ?? '' }}"
                        placeholder="No HP / IG / WA">
                </div>

            </div>
        </div>
        @endforeach
        <div>
            <button type="submit" class="bg-danger text-white">Simpan Perubahan</button>
            <button>Batal</button>
        </div>
    </form>


    <script>
    document.querySelectorAll('.vendor-checkbox').forEach(cb => {
        cb.addEventListener('change', function() {
            const target = document.getElementById(this.dataset.target);
            target.style.display = this.checked ? 'block' : 'none';

            // auto required
            target.querySelectorAll('input[type="text"]').forEach(input => {
                input.required = this.checked;
            });
        });
    });
    </script>
</body>

</html>