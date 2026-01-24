<button type="button" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#editVendorModal-{{ $vendor->id }}">
    <span class="icon text-white">
        <i class="far fa-edit text-warning"></i>
    </span>
</button>

<div class="modal fade" id="editVendorModal-{{ $vendor->id }}" tabindex="-1" role="dialog" aria-labelledby="editVendorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-secondary ">

            <form action="{{ route('admin.vendors.update', $vendor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="vendorModalLabel">
                        Ubah Vendor
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Jenis Vendor</label>
                        <input type="text" name="jenis_vendor" class="form-control" value="{{ $vendor->jenis_vendor }}" required>
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
