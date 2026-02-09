<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createVendorModal">
  <i class="fas fa-plus"></i>  Tambah Vendor
</button>

<div class="modal fade" id="createVendorModal" tabindex="-1" role="dialog" aria-labelledby="createVendorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.vendors.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="vendorModalLabel">
                        Jenis Vendor
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Jenis Vendor</label>
                        <input type="text" name="jenis_vendor" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger bg-danger" data-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-success bg-success">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
