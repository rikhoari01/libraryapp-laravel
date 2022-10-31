<div class="modal fade" id="add-circulation" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Peminjaman Buku Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"></span>
                        </button>
                  </div>
                  <form action="/book/borrow" method="POST">
                        <div class="modal-body">
                              @csrf
                              <div class="mb-2">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <select class="form-control" data-width="100%" name="isbn" id="isbn">
                                          <option></option>
                                          @foreach($available as $a)
                                          <option value="{{ $a->isbn }}" data-id="{{ $a->id }}">{{ $a->isbn }}</option>
                                          @endforeach
                                    </select>
                                    <input type="text" id="id_book" name="id_book" hidden>
                              </div>

                              <div class="mb-2">
                                    <label for="title" class="form-label">Judul Buku</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Judul Buku" value="" required disabled>
                              </div>

                              <div class="mb-2">
                                    <label for="user_id" class="form-label">ID Anggota</label>
                                    <select class="form-control" data-width="100%" name="user_id" id="user_id">
                                          <option></option>
                                          @foreach($user as $u)
                                          <option value="{{ $u->user_id }}" data-id="{{ $u->id }}">{{ $u->user_id }}</option>
                                          @endforeach
                                    </select>
                                    <input type="text" id="id_user" name="id_user" hidden>
                              </div>

                              <div class="mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anggota" value="" required disabled>
                              </div>

                              <div class="mb-2">
                                    <label for="borrow_date" class="form-label">Tanggal Peminjaman</label>
                                    <input type="text" class="form-control datepicker @error('borrow_date') is-invalid @enderror" id="borrow_date" name="borrow_date" placeholder="Tanggal Peminjaman" value="{{ old('borrow_date') }}" required disabled>
                              </div>

                              <div class="mb-2">
                                    <label for="return_date" class="form-label">Tanggal Pengembalian</label>
                                    <input type="text" class="form-control datepicker @error('return_date') is-invalid @enderror" id="return_date" name="return_date" placeholder="Tanggal Pengembalian" value="{{ old('return_date') }}" required disabled>
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary borrow">Peminjaman Baru</button>
                        </div>
                  </form>
            </div>
      </div>
</div>