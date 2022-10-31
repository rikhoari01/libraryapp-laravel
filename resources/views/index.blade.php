@extends('layouts.main')

@section('title', 'Libraryapp | Aplikasi Perpustakaan Online')

@section('body')
<section class="form-login">
      <div class="overlay px-3">
            <div class="container">
                  <div class="row">
                        <div class="col-sm-12">
                              <div class="text-center">
                                    <img class="main-ico" src="images/ico.png" alt="logo">
                                    <h3>LIBRARYAPP</h3>
                              </div>
                        </div>

                        <form action="/login" method="post">
                              @csrf

                              @if(session()->has('loginErr'))
                              <div class="input-desc text-danger text-center">Email atau Password Salah!</div>
                              @endif

                              <div class="col-sm-12 mt-2 input-field">
                                    <span class="ico-field @error('email') invalid @enderror">
                                          <i class="fa fa-at" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('email') invalid @enderror" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                              </div>

                              <div class="col-sm-12 mt-3 input-field">
                                    <span class="ico-field @error('password') invalid @enderror">
                                          <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input class="input @error('password') invalid @enderror" type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" required>
                                    <span class="passtoggle">
                                          <i class="pass-switch fa fa-eye" aria-hidden="true"></i>
                                    </span>
                              </div>
                              
                              <p class="mt-2">Lupa Password? Klik <a href="">disini</a></p>

                              <button type="submit" class="btn btn-primary btn-login">Masuk</button>
                        </form>

                        <div class="text-center">
                              <p class="mt-3">Belum Punya Akun? <a href="/register">Daftar</a></p>
                              <p class="fw-bold">Atau</p>
                              <p class="alternate-text">Masuk Melalui</p>
                              <div class="alternate-login mt-2">
                                    <a href=""><img src="images/google-ico.png" alt="google-ico-login"></a>
                                    <a href=""><img src="images/fb-ico.png" alt="fb-ico-login"></a>
                              </div>
                        </div>
                  </div>
            </div>

            <footer>
                  <p>&copy Copyright 2021 | Made with <i class="fa fa-heart"></i> by Rikhoari</p>
            </footer>
      </div>
</section>
@endsection