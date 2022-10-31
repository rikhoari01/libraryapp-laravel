<div class="sidebar">
      <div class="logo-details">
            <img src="/images/ico.png" alt="libraryapp-logo" class="logo">
            <div class="logo-name">LIBRARYAPP</div>
            <i class="fa fa-bars btn-sidebar"></i>
      </div>
      <ul class="nav-list">
            <li>
                  <a href="/admin/dashboard" class="menu {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                        <i class="fa fa-home"></i>
                        <span class="link-name">DASHBOARD</span>
                  </a>
                  <span class="tooltip">DASHBOARD</span>
            </li>
            <li>
                  <a href="/admin/list-anggota" class="menu {{ (request()->is('admin/list-anggota*')) ? 'active' : '' }}">
                        <i class="fa fa-users"></i>
                        <span class="link-name">DAFTAR ANGGOTA</span>
                  </a>
                  <span class="tooltip">DAFTAR ANGGOTA</span>
            </li>
            <li>
                  <a href="/admin/list-buku" class="menu {{ (request()->is('admin/list-buku*')) ? 'active' : '' }}">
                        <i class="fa fa-book"></i>
                        <span class="link-name">DAFTAR BUKU</span>
                  </a>
                  <span class="tooltip">DAFTAR BUKU</span>
            </li>
            <li>
                  <a href="/admin/list-peminjaman" class="menu {{ (request()->is('admin/list-peminjaman*')) ? 'active' : '' }}">
                        <i class="fa fa-book-reader"></i>
                        <span class="link-name">DAFTAR PEMINJAMAN</span>
                  </a>
                  <span class="tooltip">DAFTAR PEMINJAMAN</span>
            </li>
            <li>
                  <a href="/admin/list-admin" class="menu  {{ (request()->is('admin/list-admin*')) ? 'active' : '' }}">
                        <i class="fa fa-user-shield"></i>
                        <span class="link-name">DAFTAR ADMIN</span>
                  </a>
                  <span class="tooltip">DAFTAR ADMIN</span>
            </li>
            <li class="profile">
                  <div class="profile-details">
                        @if(auth()->user()->profile)
                        <img src="{{ asset('/storage/' . auth()->user()->profile) }}" alt="profile-image">
                        @else
                        <img src="/images/default-profile.png" alt="profile-image">
                        @endif
                        <div class="name-job">
                              <div class="name">{{ auth()->user()->name }}</div>
                              <div class="job">Administrator</div>
                        </div>
                  </div>
                  <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn sign-out">
                              <i class="fa fa-sign-out-alt"></i>
                        </button>
                  </form>
            </li>
      </ul>
</div>