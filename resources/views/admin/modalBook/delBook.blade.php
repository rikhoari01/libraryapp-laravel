<div class="modal" id="del-book" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title">Peringatan !!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <p class="d-inline">Apakah anda yakin ingin menghapus buku berjudul "<div class="d-inline" id="judul"></div>" ?</p>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="/book/delete" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <input type="text" id="del_id" name="del_id" value="" hidden>
                              <input type="text" id="del_title" name="del_title" value="" hidden>
                              <input type="text" id="del_cover" name="del_cover" value="" hidden>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>                        
                  </div>
            </div>
      </div>
</div>