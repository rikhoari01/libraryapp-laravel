<div class="modal fade" id="edit-book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Buku
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"></span>
                        </button>
                  </div>
                  <form action="/book/edit" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                        @csrf
                              <input type="text" name="edit_id" id="edit_id" value="" hidden>
                              <input type="text" name="old_cover" id="old_cover" value="" hidden>
                              <div class="mb-2">
                                    <label for="edit_isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control @error('edit_isbn') is-invalid @enderror" id="edit_isbn" name="edit_isbn" placeholder="ISBN Buku" value="" required>
                              </div>

                              <div class="mb-2">
                                    <label for="edit_title" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('edit_title') is-invalid @enderror" id="edit_title" name="edit_title" placeholder="Judul Buku" value="" required>
                              </div>

                              <div class="mb-2">
                                    <label for="edit_author" class="form-label">Penulis</label>
                                    <input type="text" class="form-control @error('edit_author') is-invalid @enderror" id="edit_author" name="edit_author" placeholder="Penulis Buku" value="" required>
                              </div>

                              <div class="mb-2">
                                    <label for="edit_publisher" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control @error('edit_publisher') is-invalid @enderror" id="edit_publisher" name="edit_publisher" placeholder="Penerbit Buku" value="" required>
                              </div>

                              <div class="mb-2">
                                    <label for="edit_publication_year" class="form-label">Tahun Terbit</label>
                                    <input type="text" class="form-control @error('edit_publication_year') is-invalid @enderror" id="edit_publication_year" name="edit_publication_year" placeholder="Tahun Terbit Buku" value="" required>
                              </div>

                              <div class="mb-2">
                                    <label for="edit_synopsis" class="form-label">Sinopsis</label>
                                    <textarea class="form-control @error('edit_synopsis') is-invalid @enderror" id="edit_synopsis" name="edit_synopsis" rows="3" placeholder="Sinopsis Buku" required></textarea>
                              </div>

                              <div class="mb-2">
                                    <label for="edit_cover" class="form-label">Foto Sampul</label>
                                    <input type="file" class="form-control" id="edit_cover" name="edit_cover">
                                    @error('edit_cover') 
                                          <p class="text-danger">{{ $message }}</p>
                                    @enderror
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-warning">Simpan</button>
                        </div>
                  </form>
            </div>
      </div>
</div>