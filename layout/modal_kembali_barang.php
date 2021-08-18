<!-- Modal -->
<div class="modal fade" id="kembali-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Form Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" id="form-kembali">
            <div class="row">
                <div class="col-12">
                  <div class="alert alert-success d-none" id="form-success-kembali">Barang telah dikembalikan! Halaman akan direfresh...</div>
                  <div class="alert alert-danger d-none" id="form-failed-kembali">Barang gagal dikembalikan! Mohon cek form anda atau hubungi administrator!</div>
                  <div class="alert alert-warning d-none" id="form-loading-kembali">Mengupdate halaman...</div>
                </div>
                <div class="form-group col-12">
                    <label for="tanggal-kembali">Tanggal Kembali</label>
                    <input type="date" class="form-control"  id="tanggal-kembali" />
                </div>
                <input type="hidden" id="form-uuid-barang" />
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary" id="submit-form-kembali">Kembalikan</button>
      </div>
    </div>
  </div>
</div>