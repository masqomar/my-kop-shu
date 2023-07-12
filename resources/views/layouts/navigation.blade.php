<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->first_name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-header">MENU KOPERASI</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-piggy-bank nav-icon"></i>
                    <p>
                        Transaksi Kas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{route('admin.pemasukan-kas.index')}}" class="nav-link">
                        <i class="fas fa-download nav-icon"></i>
                            <p>Pemasukan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.pengeluaran-kas.index')}}" class="nav-link">
                        <i class="fas fa-money-check-alt nav-icon"></i>
                            <p>Pengeluaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.transfer-kas.index')}}" class="nav-link">
                        <i class="fas fa-random nav-icon"></i>
                            <p>Transfer</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-wallet nav-icon"></i>
                    <p>
                        Simpanan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-download nav-icon"></i>
                            <p>Setoran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-share nav-icon"></i>
                            <p>Penarikan</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-handshake nav-icon"></i>
                    <p>
                        Pinjaman
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Pengajuan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Pinjaman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bayar Angsuran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pinjaman Lunas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Angsuran</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book nav-icon"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Anggota</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kas Anggota</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jatuh Tempo</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kredit Macet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Transaksi Kas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buku Besar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.laporan-neraca-saldo.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Neraca Saldo</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kas Simpanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kas Pinjaman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Saldo Kas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.laporan-laba-rugi.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laba Rugi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.laporan-shu.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SHU</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database nav-icon"></i>
                    <p>
                        Master Data
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{route('admin.jenis-simpanan.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jenis Simpanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.jenis-akun.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jenis Akun</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Kas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.lama-angsuran.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lama Angsuran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.data-anggota.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Anggota</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tools nav-icon"></i>
                    <p>
                        Setting
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Identitas Koperasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Suku Bunga</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">MENU JIMMART</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nva-icon fas fa-search-dollar nav-icon"></i>
                    <p>
                        Topup JIMPay
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{route('admin.voucher-bulanan.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Voucher Bulanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.topup.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cash / Transfer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ambil Simp Sukarela</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-store nav-icon"></i>
                    <p>
                        Mitra JIMMart
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Mitra</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pencairan JIMPay</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-header">MENU LAIN - LAIN</li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->