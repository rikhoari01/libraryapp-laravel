<div class="modal" id="del-user" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title">Peringatan !!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <p class="d-inline">Apakah anda yakin ingin menghapus data user dengan nomor anggota "<div class="d-inline" id="no_anggota"></div>" ?</p>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="/user/delete" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <input type="text" id="del_id" name="del_id" value="" hidden>
                              <input type="text" id="del_userid" name="del_userid" value="" hidden>
                              <input type="text" id="del_profile" name="del_profile" value="" hidden>
                              <input type="text" id="del_role" name="del_role" value="" hidden>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>                        
                  </div>
            </div>
      </div>
</div>