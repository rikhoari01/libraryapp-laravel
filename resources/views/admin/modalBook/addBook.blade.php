<div class="modal fade" id="add-book" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buku Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"></span>
                        </button>
                  </div>
                  <form action="/book/add" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                              @csrf
                              <div class="mb-2">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" placeholder="ISBN Buku" value="{{ old('isbn') }}" required>
                              </div>

                              <div class="mb-2">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul Buku" value="{{ old('title') }}" required>
                              </div>

                              <div class="mb-2">
                                    <label for="author" class="form-label">Penulis</label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Penulis Buku" value="{{ old('author') }}" required>
                              </div>

                              <div class="mb-2">
                                    <label for="publisher" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" placeholder="Penerbit Buku" value="{{ old('publisher') }}" required>
                              </div>

                              <div class="mb-2">
                                    <label for="publication_year" class="form-label">Tahun Terbit</label>
                                    <input type="text" class="form-control @error('publication_year') is-invalid @enderror" id="publication_year" name="publication_year" placeholder="Tahun Terbit Buku" value="{{ old('publication_year') }}" required>
                              </div>

                              <div class="mb-2">
                                    <label for="synopsis" class="form-label">Sinopsis</label>
                                    <textarea class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" name="synopsis" rows="3" placeholder="Sinopsis Buku" required>{{ old('synopsis') }}</textarea>
                              </div>

                              <div class="mb-2">
                                    <label for="cover" class="form-label">Foto Sampul</label>
                                    <input type="file" class="form-control" id="cover" name="cover">
                                    @error('cover') 
                                          <p class="text-danger">{{ $message }}</p>
                                    @enderror
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                  </form>
            </div>
      </div>
</div>