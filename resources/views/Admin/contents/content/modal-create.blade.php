<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createContentModal">
  <i class="fas fa-plus"></i> Tambah Konten
</button>

<div class="modal fade" id="createContentModal" tabindex="-1" role="dialog" aria-labelledby="createContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">

            <form action="{{ route('admin.contents.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="ContentModalLabel">
                        Tambah Konten
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Tipe Konten</label>
                        <select name="tipe" id="tipe" class="form-control bg-dark" required>
                            <option value="" disabled selected>Pilih Tipe Konten</option>
                            <option value="beranda">Beranda</option>
                            <option value="tentang">Tentang Kami</option>
                            <option value="layanan">Layanan</option>
                            <option value="kontak">Kontak</option>
                        </select>
                    </div>
                </div>

                 <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Isi</label>
                        <textarea name="isi" id="isi" class="form-control" required></textarea>
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
