<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createPackageModal">
  <i class="fas fa-plus"></i> Tambah Paket
</button>

<div class="modal fade" id="createPackageModal" tabindex="-1" role="dialog" aria-labelledby="createPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-secondary ">

            <form action="{{ route('admin.packages.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="paketModalLabel">
                        Tambah paket
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Jenis Paket</label>
                        <input type="text" name="jenis" class="form-control" required>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Status</label>
                       <div class="d-flex align-items-center  py-2">
                            <input class="form-check-input m-0" type="radio" name="status" value="aktif">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 align-items-center justify-content-between ">
                                    <span>Aktif</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-2">
                                <input class="form-check-input m-0" type="radio" name="status" value="non aktif">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Non-Aktif</span>
                                    </div>
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
