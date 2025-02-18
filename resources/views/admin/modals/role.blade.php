<div class="modal fade" id="add_role" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-role">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">
                            Role Name
                        </label>
                        <input type="text" name="role_name" class="form-control">
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

<div class="modal fade" id="update_role" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-update-role">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">
                            Role Name
                        </label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="role_name" class="form-control">
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

<div class="modal fade" id="delete_role" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-delete-role">
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
