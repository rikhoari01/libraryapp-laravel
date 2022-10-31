<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anggota Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"></span>
                        </button>
                  </div>
                  <form action="/user/add" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                              @csrf
                              <input type="text" id="role" name="role" value="" hidden>
                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('name') invalid @enderror">
                                          <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('name') invalid @enderror" type="text" name="name" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>

                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('email') invalid @enderror">
                                          <i class="fa fa-at" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('email') invalid @enderror" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                                    <div class="input-desc">*yourname@example.com</div>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('birthdate') invalid @enderror">
                                          <i class="fa fa-calendar-week" aria-hidden="true"></i>
                                    </span>
                                    <input class="input datepicker @error('birthdate') invalid @enderror" type="text" name="birthdate" id="birthdate" placeholder="Tanggal Lahir" value="{{ old('birthdate') }}" required>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('phone') invalid @enderror">
                                          <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('phone') invalid @enderror" type="text" name="phone" id="phone" placeholder="No. HP" value="{{ old('phone') }}" required>
                                    <div class="input-desc">*081234567890</div>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field">
                                          <i class="fa fa-venus" aria-hidden="true"></i>
                                    </span>
                                    <select class="input selectopt" name="gender" id="gender" required>
                                          <option value="" hidden>Jenis Kelamin</option>
                                          <option value="Laki-Laki">Laki-Laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                    </select>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('password') invalid @enderror">
                                          <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('password') invalid @enderror" type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" required>
                                    <div class="input-desc">*Min 8 huruf dan Max 16 huruf</div>
                                    <span class="passtoggle">
                                          <i class="pass-switch fa fa-eye" aria-hidden="true"></i>
                                    </span>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('address') invalid @enderror">
                                          <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                    </span>
                                    <textarea class="input @error('address') invalid @enderror" name="address" id="address" cols="30" rows="10" placeholder="Alamat" required>{{ old('address') }}</textarea>
                              </div>

                              <div class="form-group row mt-2">
                                    <label class="col-sm-3 col-md-2 col-lg-3 col-form-label">Foto Profil</label>
                                    <div class="col-sm col-lg form-inline">
                                          <input class="form-control @error('profile') invalid @enderror" type="file" id="profile" name="profile">
                                    </div>
                                    @error('profile') 
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