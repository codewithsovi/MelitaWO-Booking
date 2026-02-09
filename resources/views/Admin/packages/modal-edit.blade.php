<button type="button" class="btn btn-icon-split" data-toggle="modal"
    data-target="#editPackageModal-{{ $package->id }}">
    <span class="icon text-white">
        <i class="far fa-edit text-warning"></i>
    </span>
</button>

<div class="modal fade" id="editPackageModal-{{ $package->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="paketModalLabel">
                        Ubah paket
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Jenis Paket</label>
                        <input type="text" name="jenis" class="form-control" value="{{ $package->jenis }}" required>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $package->harga }}" required>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required>{{ $package->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Status</label>
                        <div class="d-flex align-items-center py-2">
                            <input class="form-check-input m-0" type="radio" name="status" value="aktif"
                                {{ $package->status === 'aktif' ? 'checked' : '' }}>
                            <div class="w-100 ms-3">
                                <span>Aktif</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center py-2">
                            <input class="form-check-input m-0" type="radio" name="status" value="non aktif"
                                {{ $package->status === 'non aktif' ? 'checked' : '' }}>
                            <div class="w-100 ms-3">
                                <span>Non-Aktif</span>
                            </div>
                        </div>

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