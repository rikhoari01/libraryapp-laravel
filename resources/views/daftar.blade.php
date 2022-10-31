@extends('layouts.main')

@section('title', 'Pendaftaran Akun Baru | Libraryapp')

@section('body')
@include('sweetalert::alert')
<section class="form-signup">
      <div class="overlay px-3">
            <div class="container">
                  <div class="row">
                        <div class="col-sm-12">
                              <div class="text-center">
                                    <h2><img class="main-ico" src="images/ico.png" alt="logo"> LIBRARYAPP</h2>
                                    <h4>Pendaftaran Akun Baru</h4>
                              </div>
                        </div>
                        <form action="/register" method="post">
                              @csrf
                              <div class="row">
                                    <div class="col-sm mt-3 pr-2 input-field">
                                          <span class="ico-field @error('name') invalid @enderror">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                          </span>
                                          <input class="input @error('name') invalid @enderror" type="text" name="name" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>

                                    </div>

                                    <div class="col-sm mt-3 input-field">
                                          <span class="ico-field @error('email') invalid @enderror">
                                                <i class="fa fa-at" aria-hidden="true"></i>
                                          </span>
                                          <input class="input @error('email') invalid @enderror" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                                          <div class="input-desc">*yourname@example.com</div>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="col-sm mt-3 pr-2 input-field">
                                          <span class="ico-field @error('birthdate') invalid @enderror">
                                                <i class="fa fa-calendar-week" aria-hidden="true"></i>
                                          </span>
                                          <input class="input datepicker @error('birthdate') invalid @enderror" type="text" name="birthdate" id="birthdate" placeholder="Tanggal Lahir" value="{{ old('birthdate') }}" required>
                                    </div>

                                    <div class="col-sm mt-3 input-field">
                                          <span class="ico-field @error('phone') invalid @enderror">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                          </span>
                                          <input class="input @error('phone') invalid @enderror" type="text" name="phone" id="phone" placeholder="No. HP" value="{{ old('phone') }}" required>
                                          <div class="input-desc">*081234567890</div>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="col-sm mt-3 pr-2 input-field">
                                          <span class="ico-field">
                                                <i class="fa fa-venus" aria-hidden="true"></i>
                                          </span>
                                          <select class="input selectopt" name="gender" id="gender" required>
                                                <option value="" hidden>Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                          </select>
                                    </div>

                                    <div class="col-sm mt-3 input-field">
                                          <span class="ico-field @error('password') invalid @enderror">
                                                <i class="fa fa-key" aria-hidden="true"></i>
                                          </span>
                                          <input class="input @error('password') invalid @enderror" type="password" name="password" id="password" placeholder="Password"  value="{{ old('password') }}" required>
                                          <div class="input-desc">*Min 8 huruf dan Max 16 huruf</div>
                                          <span class="passtoggle">
                                                <i class="pass-switch fa fa-eye" aria-hidden="true"></i>
                                          </span>
                                    </div>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('address') invalid @enderror">
                                          <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                    </span>
                                    <textarea class="input @error('address') invalid @enderror" name="address" id="address" cols="30" rows="10" placeholder="Alamat" required>{{ old('address') }}</textarea>
                              </div>

                              <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="privacy" value="aggree" required>
                                    <label class="form-check-label" for="privacy">Saya Setuju Dengan <a href="">Syarat & Ketentuan</a> Yang Berlaku.</label>
                              </div>

                              <button type="submit" class="btn btn-primary btn-signup mt-4">Daftar</button>
                        </form>

                        <p class="mt-3 text-center">Sudah Punya Akun? <a href="/">Masuk</a></p>

                  </div>
            </div>

            <footer>
                  <p>&copy Copyright 2021 | Made with <i class="fa fa-heart"></i> by Rikhoari</p>
            </footer>
      </div>
</section>
@endsection