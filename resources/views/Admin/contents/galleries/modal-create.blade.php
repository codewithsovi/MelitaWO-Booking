<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createGalleryModal">
  <i class="fas fa-plus"></i> Tambah Foto
</button>

<div class="modal fade" id="createGalleryModal" tabindex="-1" role="dialog" aria-labelledby="createGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-secondary ">

            <form action="#" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="GalleryModalLabel">
                        Tambah Foto
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Foto</label>
                        <input type="file" name="foto" class="form-control bg-dark" required>
                    </div>
                </div>

                 <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi foto">
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
