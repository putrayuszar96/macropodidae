<!-- Modal -->
<div class="modal fade" id="tambah-divisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <div class="form-group col-12">
                    <label for="form-kantor-cabang">Kantor Cabang</label>
                    <input type="text" class="form-control d-none" id="form-kantor-cabang-hidden">
                    <input type="text" class="form-control" id="form-kantor-cabang" placeholder="" value="" disabled>
                </div>
                <div class="form-group col-12">
                    <label for="nama-divisi">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama-divisi" placeholder="Masukkan nama divisi...">
                </div>
                <div class="form-group col-12">
                    <strong>Urutan Rak</strong>
                </div>
                <div class="form-group col-6">
                    <label for="rak-mulai">Rak Mulai</label>
                    <select class="form-control" id="rak-mulai"></select>
                </div>
                <div class="form-group col-6">
                    <label for="subrak-mulai">Subrak Mulai</label>
                    <select class="form-control" id="subrak-mulai"></select>
                </div>
                <div class="form-group col-6">
                    <label for="rak-akhir">Rak Berakhir</label>
                    <select class="form-control" id="rak-akhir"></select>
                </div>
                <div class="form-group col-6">
                    <label for="subrak-akhir">Subrak Berakhir</label>
                    <select class="form-control" id="subrak-akhir"></select>
                </div>
                <div class="form-group col-6">
                    <label for="rak-tambahan">Rak Tambahan</label>
                    <select class="form-control" id="rak-tambahan"></select>
                </div>
                <div class="form-group col-6">
                    <label for="subrak-tambahan">Subrak Tambahan</label>
                    <select class="form-control" id="subrak-tambahan"></select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>