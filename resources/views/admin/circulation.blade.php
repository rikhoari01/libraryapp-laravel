@extends('layouts.main')

@section('title', 'Sirkulasi Buku | Libraryapp')

@section('body')
@include('admin.sidebar')
@include('sweetalert::alert')

<section id="circulation" class="circulation">
      <div class="header shadow">
            <div class="container">
                  <div class="row">
                        <div class="col-sm left-header">
                              <div class="text-header">Sirkulasi Buku</div>
                        </div>
                        @include('admin.right')
                  </div>
            </div>
      </div>

      <div class="container py-2">
            <div class="row mt-4">
                  <div class="col-sm-12 btn-center">
                        <button id="btn-addCirculation" class="btn btn-success shadow" type="button" data-bs-toggle="modal" data-bs-target="#add-circulation"><i class="fa fa-book-open"></i> Peminjaman Buku Baru</button>
                  </div>
            </div>

            <div class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Peminjaman Buku</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="booksTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Jatuh Tempo Pengembalian</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($borrowed as $i => $b)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td>{{ $b->borrow->title }}</td>
                                                <td class="text-center">{{ $b->borrower->user_id }}</td>
                                                <td>{{ $b->borrower->name }}</td>
                                                <td class="text-center">{{ $b->borrow_date }}</td>
                                                <td class="text-center">{{ $b->return_date }}</td>
                                                <td class="text-center">
                                                      <button class="btn btn-outline-primary btn-action mb-1 return-book" data-id="{{ $b->id }}" data-book="{{ $b->borrow->id }}" data-name="{{ $b->borrower->user_id }}" data-title="{{ $b->borrow->title }}" data-toggle="modal" data-target="#return-book"><i class="fa fa-check"></i></button>
                                                </td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

            <div class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Peminjaman Jatuh Tempo</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="latebooksTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Jatuh Tempo Pengembalian</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($late as $i => $l)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td>{{ $l->borrow->title }}</td>
                                                <td class="text-center">{{ $l->borrower->user_id }}</td>
                                                <td>{{ $l->borrower->name }}</td>
                                                <td class="text-center">{{ $l->borrow_date }}</td>
                                                <td class="text-center">{{ $l->return_date }}</td>
                                                <td class="text-center">
                                                      <!-- <button class="btn btn-outline-primary btn-action mb-1 return-book" data-id="{{ $b->id }}" data-book="{{ $b->borrow->id }}" data-name="{{ $b->borrower->user_id }}" data-title="{{ $b->borrow->title }}" data-toggle="modal" data-target="#return-book"><i class="fa fa-check"></i></button> -->
                                                </td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

            <div class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Histori Peminjaman</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="historyTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($history as $i => $h)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td>{{ $h->borrow->title }}</td>
                                                <td class="text-center">{{ $h->borrower->user_id }}</td>
                                                <td>{{ $h->borrower->name }}</td>
                                                <td class="text-center">{{ $h->borrow_date }}</td>
                                                <td class="text-center">{{ $h->updated_at->format('Y-m-d') }}</td>
                                                <td class="text-center">
                                                      <button class="btn btn-outline-primary btn-action mb-1 preview-history" data-id="{{ $h->id }}" data-date="{{ $h->updated_at->format('Y-m-d') }}" data-toggle="modal" data-target="#prev-history"><i class="fa fa-file"></i></button>
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

            <a class="scroll-to-top rounded" href="#circulation">
                  <i class="fas fa-angle-up"></i>
            </a>
</section>

@include('admin.modalCirculation.addModal')
@include('admin.modalCirculation.previewModal')
@include('admin.modalCirculation.returnModal')
@endsection