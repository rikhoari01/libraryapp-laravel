@extends('layouts.main')

@section('title', 'Admin Dashboard | Libraryapp')

@section('body')
@include('admin.sidebar')

<section id="home" class="home">
      <div class="header shadow">
            <div class="container">
                  <div class="row">
                        <div class="col-sm left-header">
                              <div class="text-header">Dashboard Admin</div>
                        </div>
                        @include('admin.right')
                  </div>
            </div>
      </div>

      <div class="container py-2">

            <div class="row mt-4">
                  <div class="col-sm">
                        <h3 class="d-inline-block">Ringkasan Hari Ini</h3>
                        <div class="float-end d-inline-block">
                              <h5 class="mt-2 d-inline-block">{{ $date = date('d/m/Y'); }}</h5>
                        </div>
                        <hr class="my-0">
                  </div>
            </div>

            <div class="row mt-4">
                  <div class="col-xl-3 col-md-6 mb-4">
                        <a href="#anggota-baru">
                              <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                          <div class="row align-items-center">
                                                <div class="col mr-2">
                                                      <div class="text-xs text-primary text-uppercase mb-1">Anggota Baru</div>
                                                      <div class="h5 mb-0 text-gray">@if($sumNewUser) {{ $sumNewUser }} Orang @else Tidak Ada @endif</div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fa fa-user-friends fa-3x text-gray-i"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </a>
                  </div>
                  <div class="col-xl-3 col-md-6 mb-4">
                        <a href="#buku-baru">
                              <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                          <div class="row align-items-center">
                                                <div class="col mr-2">
                                                      <div class="text-xs text-success text-uppercase mb-1">Buku Baru</div>
                                                      <div class="h5 mb-0 text-gray">@if($sumNewBook) {{ $sumNewBook }} Buku @else Tidak Ada @endif</div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fa fa-book-medical fa-3x text-gray-i"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </a>
                  </div>
                  <div class="col-xl-3 col-md-6 mb-4">
                        <a href="#peminjaman">
                              <div class="card border-left-info shadow py-2">
                                    <div class="card-body">
                                          <div class="row align-items-center">
                                                <div class="col mr-2">
                                                      <div class="text-xs text-info text-uppercase mb-1">Buku Dipinjam</div>
                                                      <div class="h5 mb-0 text-gray">@if($sumNewBorrow) {{ $sumNewBorrow }} Buku @else Tidak Ada @endif</div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fa fa-book-open fa-3x text-gray-i"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </a>
                  </div>
                  <div class="col-xl-3 col-md-6 mb-4">
                        <a href="#pengembalian">
                              <div class="card border-left-warning shadow py-2">
                                    <div class="card-body">
                                          <div class="row align-items-center">
                                                <div class="col mr-2">
                                                      <div class="text-xs text-warning text-uppercase mb-1">Buku Dikembalikan</div>
                                                      <div class="h5 mb-0 text-gray">@if($sumNewReturn) {{ $sumNewReturn }} Buku @else Tidak Ada @endif</div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fa fa-book fa-3x text-gray-i"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </a>
                  </div>
            </div>

            <div id="anggota-baru" class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Anggota Baru</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="newMember" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>ID Anggota</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Tanggal Lahir</th>
                                                <th>No. HP</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Foto Profil</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($newUser as $i => $user)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td class="text-center">{{ $user->user_id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-center">{{ $user->birthdate }}</tdclass=>
                                                <td class="text-center">{{ $user->phone }}</tdclass=>
                                                <td class="text-center">{{ $user->gender }}</td>
                                                <td>{{ $user->address }}</td>
                                                @if($user->profile)
                                                <td class="text-center"><img src="{{ asset('/storage/' . $user->profile) }}" alt="profil-image" class="prev-img"></td>
                                                @else
                                                <td class="text-center"><img src="/images/default-profile.png" alt="profil-image" class="prev-img"></td>
                                                @endif
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

            <div id="buku-baru" class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Buku Baru</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="newBooks" width="100%" cellspacing="0">
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
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($newBook as $i => $book)
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
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

            <div id="peminjaman" class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Peminjaman Buku Terbaru</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="newBooksloan" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Jatuh Tempo Pengembalian</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($newBorrow as $i => $b)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td>{{ $b->borrow->title }}</td>
                                                <td class="text-center">{{ $b->borrower->user_id }}</td>
                                                <td>{{ $b->borrower->name }}</td>
                                                <td class="text-center">{{ $b->borrow_date }}</td>
                                                <td class="text-center">{{ $b->return_date }}</td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

            <div id="pengembalian" class="card shadow mt-4 mb-4">
                  <div class="card-header py-3">
                        <h6 class="m-0">Daftar Pengembalian Buku Terbaru</h6>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="newBooksreturn" width="100%" cellspacing="0">
                              <thead class="text-center">
                                          <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($newReturn as $i => $h)
                                          <tr>
                                                <td class="text-center">{{ $i+1 }}</td>
                                                <td>{{ $h->borrow->title }}</td>
                                                <td class="text-center">{{ $h->borrower->user_id }}</td>
                                                <td>{{ $h->borrower->name }}</td>
                                                <td class="text-center">{{ $h->borrow_date }}</td>
                                                <td class="text-center">{{ $h->updated_at->format('Y-m-d') }}</td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

      </div>


      <footer class="p-0 m-0">
            <p class="text-dark">&copy Copyright 2021 | Made with <i class="fa fa-heart"></i> by Rikhoari</p>
      </footer>

      <a class="scroll-to-top rounded" href="#home">
            <i class="fas fa-angle-up"></i>
      </a>
</section>

@endsection