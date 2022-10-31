<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anggota <div class="d-inline" id="top-id"></div>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"></span>
                        </button>
                  </div>
                  <form action="/user/edit" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                        @csrf
                              <input type="text" name="edit_id" id="edit_id" value="" hidden>
                              <input type="text" name="edit_userid" id="edit_userid" value="" hidden>
                              <input type="text" name="old_profile" id="old_profile" value="" hidden>
                              <input type="text" name="edit_role" id="edit_role" value="" hidden>
                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('edit_name') invalid @enderror">
                                          <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('edit_name') invalid @enderror" type="text" name="edit_name" id="edit_name" placeholder="Nama Lengkap" value="" required>

                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('edit_email') invalid @enderror">
                                          <i class="fa fa-at" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('edit_email') invalid @enderror" type="email" name="edit_email" id="edit_email" placeholder="Email" value="" required>
                                    <div class="input-desc">*yourname@example.com</div>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('edit_birthdate') invalid @enderror">
                                          <i class="fa fa-calendar-week" aria-hidden="true"></i>
                                    </span>
                                    <input class="input datepicker @error('edit_birthdate') invalid @enderror" type="text" name="edit_birthdate" id="edit_birthdate" placeholder="Tanggal Lahir" value="" required>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('edit_phone') invalid @enderror">
                                          <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('edit_phone') invalid @enderror" type="text" name="edit_phone" id="edit_phone" placeholder="No. HP" value="" required>
                                    <div class="input-desc">*081234567890</div>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field">
                                          <i class="fa fa-venus" aria-hidden="true"></i>
                                    </span>
                                    <select class="input genderopt" name="edit_gender" id="edit_gender" required>
                                          <option value="" hidden>Jenis Kelamin</option>
                                          <option value="Laki-Laki">Laki-Laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                    </select>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('edit_address') invalid @enderror">
                                          <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                    </span>
                                    <textarea class="input @error('edit_address') invalid @enderror" name="edit_address" id="edit_address" cols="30" rows="10" placeholder="Alamat" required></textarea>
                              </div>

                              <div class="form-group row mt-2">
                                    <label class="col-sm-3 col-md-2 col-lg-3 col-form-label">Foto Profil</label>
                                    <div class="col-sm col-lg form-inline">
                                          <input class="form-control @error('edit_profile') invalid @enderror" type="file" id="edit_profile" name="edit_profile">
                                    </div>
                                    @error('edit_profile') 
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