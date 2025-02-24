<div class="modal fade" id="add_category" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-category">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">
                            Kategori
                        </label>
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">
                            Kelas
                        </label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="update_category" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-update-category">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">
                            Kategori
                        </label>
                        <input type="hidden" id="id">
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">
                            Kelas
                        </label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_category" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-delete-category">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <div class="mt-3 text-center">
                        <p>Apakah anda yakin ingin hapus data ? </p>
                        <button type="button" class="btn btn-sm btn-success" id="delete">
                            Ya
                        </button>
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger">
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
