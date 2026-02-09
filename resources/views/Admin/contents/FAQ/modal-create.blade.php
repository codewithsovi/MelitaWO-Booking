<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createFAQModal">
  <i class="fas fa-plus"></i> Tambah FAQ
</button>

<div class="modal fade" id="createFAQModal" tabindex="-1" role="dialog" aria-labelledby="createFAQModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="vendorModalLabel">
                        FAQ
                    </h5>
                    <button type="button" class="close text-primary" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-white">Pertanyaan</label>
                        <input type="text" name="pertanyaan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="text-white">Jawaban</label>
                        <input type="text" name="jawaban" class="form-control" required>
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
