<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <h6 class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo.webp') }}" style="width: 32px;" alt="logo" class="me-2">
                <span class="fw-bold" style="color: #772E72">SIMRUBA</span>
            </h6>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        @if (Auth::user()->role->name == 'admin')
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Menu Utama</li>
                <li class="nav-item">
                    <a href="{{ route('rooms.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Data Ruangan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('items.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="tool"></i>
                        <span class="link-title">Data Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiCompo" role="button" aria-expanded="false"
                        aria-controls="uiCompo">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Pengajuan</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiCompo">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('roomloans.index') }}" class="nav-link">Pengajuan Ruangan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('itemloans.index') }}" class="nav-link">Pengajuan Barang</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                        aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="corner-down-left"></i>
                        <span class="link-title">Pengembalian</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiComponents">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('loanroom.return') }}" class="nav-link">Pengembalian Ruangan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('loanitem.return') }}" class="nav-link">Pengembalian Barang</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item nav-category">Riwayat</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiCompos" role="button" aria-expanded="false"
                        aria-controls="uiCompo">
                        <i class="link-icon" data-feather="archive"></i>
                        <span class="link-title">Riwayat</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiCompos">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('roomloan.history') }}" class="nav-link">Riwayat Ruangan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('itemloan.history') }}" class="nav-link">Riwayat Barang</a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>
        @else
            <ul class="nav">

                <li class="nav-item nav-category">Menu Utama</li>
                <li class="nav-item">
                    <a href="{{ route('rooms.available') }}" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Ruangan yang Tersedia</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('items.available') }}" class="nav-link">
                        <i class="link-icon" data-feather="tool"></i>
                        <span class="link-title">Barang yang Tersedia</span>
                    </a>
                </li>


                <li class="nav-item nav-category">Riwayat</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="link-icon" data-feather="archive"></i>
                        <span class="link-title">Riwayat Pengembalian</span>
                    </a>
                </li>

            </ul>
        @endif
    </div>
</nav>
