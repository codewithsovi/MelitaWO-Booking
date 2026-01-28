<button type="button" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#editGalleryModal-{{ $gallery->id }}">
    <span class="icon text-white">
        <i class="far fa-edit text-warning"></i>
    </span>
</button>
<div class="modal fade" id="editGalleryModal-{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-secondary ">

            <form action="{{ route('admin.galleries.update_foto', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="GalleryModalLabel">
                        Edit Foto
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Foto</label>
                        <input type="file" name="foto" class="form-control bg-dark" value="{{ $gallery->foto }}" required>
                    </div>
                </div>

                 <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="{{ $gallery->deskripsi }}">
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
