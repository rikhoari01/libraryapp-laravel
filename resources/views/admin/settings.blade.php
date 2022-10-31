@extends('layouts.main')

@section('title', 'Admin Settings | Libraryapp')

@section('body')
@include('admin.sidebar')
@include('sweetalert::alert')

<section id="settings" class="settings">
      <div class="header shadow">
            <div class="container">
                  <div class="row">
                        <div class="col-sm left-header">
                              <div class="text-header">Pengaturan Admin</div>
                        </div>
                        <div class="col-sm right-header text-end">
                              <div class="right-menu">
                                    <a href=""><i class="fa fa-envelope"></i></a>
                                    <a href=""><i class="fa fa-bell"></i></a>
                                    <a href="/admin/settings"><i class="fa fa-cog text-white"></i></a>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <div class="container py-2">
            <div class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Pengaturan</h6>
                  </div>
                  <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account-set" type="button" role="tab" aria-controls="home" aria-selected="true">Akun</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-set" type="button" role="tab" aria-controls="profile" aria-selected="false">Password</button>
                              </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="account-set" role="tabpanel" aria-labelledby="account-tab">
                                    <form action="/user/edit" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <input type="text" name="accountId" id="accountId" value="{{ auth()->user()->id }}" hidden>
                                          <div class="mb-3 row">
                                                <label for="adminName" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Nama</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="text" class="form-control" id="adminName" name="adminName" value="{{ auth()->user()->name }}" placeholder="Nama Lengkap" required>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="adminEmail" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Email</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="{{ auth()->user()->email }}" placeholder="youremail@gmail.com" required>
                                                      @error('adminEmail')
                                                      <p class="text-danger">{{ $message }}</p>
                                                      @enderror
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="adminBirth" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="text" class="form-control datepicker" id="adminBirth" name="adminBirth" value="{{ auth()->user()->birthdate }}" placeholder="Tanggal Lahir" required>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="adminPhone" class="col-sm-3 col-md-2 col-lg-3 col-form-label">No. HP</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="text" class="form-control" id="adminPhone" name="adminPhone" value="{{ auth()->user()->phone }}" placeholder="Nomor HP" required>
                                                      @error('adminPhone')
                                                      <p class="text-danger">{{ $message }}</p>
                                                      @enderror
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="adminGender" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <select class="form-control genderopt" name="adminGender" id="adminGender" required>
                                                            <option value="" hidden>Jenis Kelamin</option>
                                                            <option value="Laki-Laki" {{ (auth()->user()->gender == 'Laki-Laki') ? 'selected' : '' }}>Laki-Laki</option>
                                                            <option value="Perempuan" {{ (auth()->user()->gender == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="adminAddress" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Alamat</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <textarea class="form-control" name="adminAddress" id="adminAddress" cols="10" rows="10" placeholder="Alamat" required>{{ auth()->user()->address }}</textarea>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="adminProfile" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Foto Profil</label>
                                                <div class="col-sm-8 col-lg-5 form-inline">
                                                      <input class="form-control" type="file" id="adminProfile" name="adminProfile">
                                                      @error('adminProfile')
                                                      <p class="text-danger">{{ $message }}</p>
                                                      @enderror
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <div class="offset-sm-3 offset-md-2 offset-lg-3 col-sm-8 col-lg-5">
                                                      <div class="preview-img-selected bg-light text-center py-2">
                                                            @if(auth()->user()->profile)
                                                            <img src="{{ asset('/storage/' . auth()->user()->profile) }}" class="show-img border shadow" alt="profile-image">
                                                            @else
                                                            <img src="/images/default-profile.png" class="show-img border shadow" alt="profile-image">
                                                            @endif
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <div class="col-sm-11 col-lg-8 form-inline">
                                                      <button class="btn btn-success float-end"><i class="fa fa-save"></i> Simpan</button>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                              <div class="tab-pane fade" id="password-set" role="tabpanel" aria-labelledby="password-tab">
                                    <form action="/user/edit" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <input type="text" name="passId" id="passId" value="{{ auth()->user()->id }}" hidden>
                                          <div class="mb-3 row">
                                                <label for="newPass" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Password Baru</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="password" class="form-control" id="newPass" name="newPass" value="" placeholder="Password Baru" required>
                                                      @error('newPass')
                                                      <p class="text-danger">{{ $message }}</p>
                                                      @enderror
                                                </div>
                                          </div>
                                          <div class="mb-5 row">
                                                <label for="newPassConfirm" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="password" class="form-control" id="newPassConfirm" name="newPassConfirm" value="" placeholder="Konfirmasi Password Baru" required>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="oldPass" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Password Lama</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="password" class="form-control" id="oldPass" name="oldPass" value="" placeholder="Password Lama" required>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <label for="oldPassConfirm" class="col-sm-3 col-md-2 col-lg-3 col-form-label">Konfirmasi Password Lama</label>
                                                <div class="col-sm-8 col-lg-5">
                                                      <input type="password" class="form-control" id="oldPassConfirm" name="oldPassConfirm" value="" placeholder="Konfirmasi Password Lama" required>
                                                      <p class="text-danger oldPass"></p>
                                                </div>
                                          </div>
                                          <div class="mb-3 row">
                                                <div class="col-sm-11 col-lg-8 form-inline">
                                                      <button class="btn btn-success float-end"><i class="fa fa-save"></i> Simpan</button>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>


      <footer class="p-0 m-0">
            <p class="text-dark">&copy Copyright 2021 | Made with <i class="fa fa-heart"></i> by Rikhoari</p>
      </footer>

      <a class="scroll-to-top rounded" href="#settings">
            <i class="fas fa-angle-up"></i>
      </a>
</section>

@endsection