<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">E-Office</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PNG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('dashboard') }}"><i class="far fa-square"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Agenda Surat</li>
            <li class="{{ Request::is('surat-masuk') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('surat-masuk') }}"><i class="fa fa-envelope"></i> <span>Surat Masuk</span></a>
            </li>
            <li class="{{ Request::is('surat-keluar') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('surat-keluar') }}"><i class="fa fa-envelope-open"></i> <span>Surat Keluar</span></a>
            </li>
            @if (Auth::check() && Auth::user()->getRole() === 'admin')
            <li class="{{ Request::is('disposisi') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('disposisi') }}"><i class="fa fa-share"></i> <span>Disposisi</span></a>
            </li>
            @endif
            <li class="menu-header">Perjalanan Dinas</li>
            <li class="{{ Request::is('sppd') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('sppd') }}"><i class="far fa-file-alt"></i> <span>SPPD</span></a>
            </li>
            <li class="{{ Request::is('rekap') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('rekap') }}"><i class="far fa-file-alt"></i> <span>Laporan SPPD</span></a>
            </li>
            @if (Auth::check() && Auth::user()->getRole() === 'admin')
            <li class="menu-header">Setting</li>
            <li class="nav-item dropdown {{ $type_menu === 'components' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa fa-database" aria-hidden="true"></i>
                    <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('user') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('kegiatan') }}"><span>User</span></a>
                    </li>
                    <li class="{{ Request::is('pegawai') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('pegawai') }}"></i> <span>Pegawai</span></a>
                    </li>
                    <li class="{{ Request::is('kegiatan') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('kegiatan') }}"><span>Kegiatan</span></a>
                    </li>
                    <li class="{{ Request::is('jenis') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('kegiatan') }}"><span>Jenis SPPD</span></a>
                    </li>
                </ul>
            </li>
            @endif
            

        </ul>
    </aside>
</div>
