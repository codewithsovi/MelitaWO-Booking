<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Vendor</title>
    <style>
        .vendor-detail {
            margin-left: 20px;
            margin-top: 8px;
            display: none;
        }
    </style>
</head>
<body>

<h2>Pilih Vendor</h2>

<form action="{{ route('vendor.store') }}" method="POST">
    @csrf

    @foreach ($vendors as $vendor)
        <div style="margin-bottom:16px;">

            <label>
               <input type="checkbox"
       class="vendor-checkbox"
       name="vendors[{{ $vendor->id }}][checked]"
       data-target="vendor-detail-{{ $vendor->id }}">
                {{ $vendor->jenis_vendor }}
            </label>

            <div id="vendor-detail-{{ $vendor->id }}" class="vendor-detail">

                <input type="hidden"
                       name="vendors[{{ $vendor->id }}][vendor_id]"
                       value="{{ $vendor->id }}">

                <div>
                    <label>Nama Vendor</label><br>
                    <input type="text"
                           name="vendors[{{ $vendor->id }}][nama_vendor]"
                           placeholder="Nama vendor">
                </div>

                <div>
                    <label>Kontak</label><br>
                    <input type="text"
                           name="vendors[{{ $vendor->id }}][kontak]"
                           placeholder="No HP / IG / WA">
                </div>

            </div>
        </div>
    @endforeach

    <button type="submit">Next</button>
</form>

<script>
document.querySelectorAll('.vendor-checkbox').forEach(cb => {
    cb.addEventListener('change', function () {
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
