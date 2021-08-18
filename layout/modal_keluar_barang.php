<!-- Modal -->
<div class="modal fade" id="pinjam-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Form Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" id="form-pinjam">
            <div class="row">
                <div class="col-12">
                  <div class="alert alert-success d-none" id="form-success-pinjam">Barang telah dipinjam! Halaman akan direfresh...</div>
                  <div class="alert alert-danger d-none" id="form-failed-pinjam">Barang gagal dipinjam! Mohon cek form anda atau hubungi administrator!</div>
                  <div class="alert alert-warning d-none" id="form-loading-pinjam">Mengupdate halaman...</div>
                </div>
                <div class="form-group col-12">
                    <label for="tanggal-pinjam">Tanggal Pinjam</label>
                    <input type="date" class="form-control"  id="tanggal-pinjam" />
                </div>
                <div class="form-group col-12">
                    <label for="peminjam">Peminjam</label>
                    <select class="form-control" id="peminjam">
                      <option value="">--- Pilih Peminjam ---</option>
                    </select>
                </div>
                <input type="hidden" id="form-uuid-barang" />
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary" id="submit-form-pinjam">Pinjam</button>
      </div>
    </div>
  </div>
</div>