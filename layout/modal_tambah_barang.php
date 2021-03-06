<!-- Modal -->
<div class="modal fade" id="tambah-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Divisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" id="form-divisi">
            <div class="row">
                <div class="col-12">
                  <div class="alert alert-success d-none" id="form-success">Barang berhasil ditambahkan! Halaman akan direfresh...</div>
                  <div class="alert alert-danger d-none" id="form-failed">Barang gagal ditambahkan! Mohon cek form anda atau hubungi administrator!</div>
                  <div class="alert alert-warning d-none" id="form-loading">Menambahkan...</div>
                </div>
                <div class="form-group col-12">
                    <label for="form-kantor-cabang">Kantor Cabang</label>
                    <input type="text" class="form-control d-none" id="form-kantor-cabang-hidden">
                    <input type="text" class="form-control" id="form-kantor-cabang" placeholder="" value="" disabled>
                </div>
                <div class="form-group col-12">
                    <label for="divisi">Divisi</label>
                    <select class="form-control" id="divisi">
                      <option value="">--- Pilih Divisi ---</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label for="nama-barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama-barang" placeholder="Masukkan nama barang...">
                </div>
                <div class="form-group col-12">
                    <label for="rak">Posisi Rak</label>
                    <select class="form-control" id="rak"></select>
                </div>
                <div class="d-none">
                  <input type="text" id="uploader" value="1" />
                  <input type="text" id="status-pinjam" value="1" />
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary" id="submit-form-divisi">Tambah</button>
      </div>
    </div>
  </div>
</div>