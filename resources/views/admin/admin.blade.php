@extends('layouts.main')

@section('title', 'Daftar Admin | Libraryapp')

@section('body')
@include('admin.sidebar')
@include('sweetalert::alert')

<section id="admin" class="admin">
      <div class="header shadow">
            <div class="container">
                  <div class="row">
                        <div class="col-sm left-header">
                              <div class="text-header">Daftar Admin</div>
                        </div>
                        @include('admin.right')
                  </div>
            </div>
      </div>

      <div class="container py-2">
            <div class="row mt-4">
                  <div class="col-sm-12 btn-center">
                        <button id="btn-addUser" class="btn btn-success shadow" type="button" data-role="1" data-bs-toggle="modal" data-bs-target="#add-user"><i class="fa fa-user-plus"></i> Tambah Admin Baru</button>
                  </div>
            </div>

            <div class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Admin</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="adminTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>ID Admin</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Tanggal Lahir</th>
                                                <th>No. HP</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Foto Profil</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($admin as $i => $a)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td class="text-center">{{ $a->user_id }}</td>
                                                <td>{{ $a->name }}</td>
                                                <td>{{ $a->email }}</td>
                                                <td class="text-center">{{ $a->birthdate }}</tdclass=>
                                                <td class="text-center">{{ $a->phone }}</tdclass=>
                                                <td class="text-center">{{ $a->gender }}</td>
                                                <td>{{ $a->address }}</td>
                                                @if($a->profile)
                                                <td class="text-center"><img src="{{ asset('/storage/' . $a->profile) }}" alt="profil-image" class="prev-img"></td>
                                                @else
                                                <td class="text-center"><img src="/images/default-profile.png" alt="profil-image" class="prev-img"></td>
                                                @endif
                                                <td class="text-center">
                                                      <button class="btn btn-outline-primary btn-action mb-1 preview-user" data-id="{{ $a->id }}" data-role="1" data-toggle="modal" data-target="#prev-user"><i class="fa fa-file"></i></button>
                                                      <button class="btn btn-outline-warning btn-action mb-1 edit-user" data-id="{{ $a->id }}" data-role="1" data-toggle="modal" data-target="#edit-user"><i class="fa fa-pencil"></i></button>
                                                      <button class="btn btn-outline-danger btn-action delete-user" data-id="{{ $a->id }}" data-role="1" data-toggle="modal" data-target="#del-user"><i class="fa fa-trash-alt"></i></button>
                                                </td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

            <footer class="p-0 m-0">
                  <p class="text-dark">&copy Copyright 2021 | Made with <i class="fa fa-heart"></i> by Rikhoari</p>
            </footer>

            <a class="scroll-to-top rounded" href="#admin">
                  <i class="fas fa-angle-up"></i>
            </a>
</section>

@include('admin.modalUser.addUser')
@include('admin.modalUser.previewUser')
@include('admin.modalUser.editUser')
@include('admin.modalUser.delUser')
@endsection