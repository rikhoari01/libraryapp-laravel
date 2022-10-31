@extends('layouts.main')

@section('title', 'Daftar Buku | Libraryapp')

@section('body')
@include('admin.sidebar')
@include('sweetalert::alert')

<section id="book" class="book">
      <div class="header shadow">
            <div class="container">
                  <div class="row">
                        <div class="col-sm left-header">
                              <div class="text-header">Daftar Buku</div>
                        </div>
                        @include('admin.right')
                  </div>
            </div>
      </div>

      <div class="container py-2">
            <div class="row mt-4">
                  <div class="col-sm-12 btn-center">
                        <button id="btn-addBook" class="btn btn-success shadow" type="button" data-bs-toggle="modal" data-bs-target="#add-book"><i class="fa fa-book-medical"></i> Tambah Buku Baru</button>
                  </div>
            </div>

            <div class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Buku</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="booksTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>ISBN</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Status</th>
                                                <th>Foto Sampul</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($books as $i => $book)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td class="text-center">{{ $book->isbn }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->author }}</td>
                                                <td>{{ $book->publisher }}</tdclass=>
                                                <td class="text-center">{{ $book->publication_year }}</tdclass=>
                                                @if($book->status == 1)
                                                <td class="text-center text-success">Tersedia</td>
                                                @else
                                                <td class="text-center text-danger">Tidak Tersedia</td>
                                                @endif

                                                @if($book->cover)
                                                <td class="text-center"><img src="{{ asset('/storage/' . $book->cover) }}" alt="book-cover" class="prev-img"></td>
                                                @else
                                                <td class="text-center"><img src="/images/book-cover.jpg" alt="book-cover" class="prev-img"></td>
                                                @endif
                                                <td class="text-center">
                                                      <button class="btn btn-outline-primary btn-action mb-1 preview-book" data-id="{{ $book->id }}" data-toggle="modal" data-target="#prev-book"><i class="fa fa-file"></i></button>
                                                      <button class="btn btn-outline-warning btn-action mb-1 edit-book" data-id="{{ $book->id }}" data-toggle="modal" data-target="#edit-book"><i class="fa fa-pencil"></i></button>
                                                      <button class="btn btn-outline-danger btn-action delete-book" data-id="{{ $book->id }}" data-toggle="modal" data-target="#del-book"><i class="fa fa-trash-alt"></i></button>
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

            <a class="scroll-to-top rounded" href="#book">
                  <i class="fas fa-angle-up"></i>
            </a>
</section>

@include('admin.modalBook.addBook')
@include('admin.modalBook.previewBook')
@include('admin.modalBook.editBook')
@include('admin.modalBook.delBook')
@endsection