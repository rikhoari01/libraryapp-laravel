<div class="modal" id="return-book" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title">Peringatan !!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <p class="d-inline">Apakah "<div class="d-inline" id="user_id"></div>" Sudah Mengembalikan Buku "<div class="d-inline" id="title"></div>" ?</p>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="/book/return" method="post" class="d-inline">
                              @csrf
                              <input type="text" id="return_id" name="return_id" value="" hidden>
                              <input type="text" id="return_bookid" name="return_bookid" value="" hidden>
                              <input type="text" id="return_title" name="return_title" value="" hidden>
                              <button type="submit" class="btn btn-danger">Kembalikan</button>
                        </form>                        
                  </div>
            </div>
      </div>
</div>