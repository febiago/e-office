<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
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
            <li class="{{ Request::is('disposisi') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('disposisi') }}"><i class="fa fa-share"></i> <span>Disposisi</span></a>
            </li>

            <li class="menu-header">Stisla</li>
            <li class="{{ Request::is('sppd') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('sppd') }}"><i class="far fa-file-alt"></i> <span>SPPD</span></a>
            </li>

            <li class="nav-item dropdown {{ $type_menu === 'modules' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('modules-calendar') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-calendar') }}">Calendar</a>
                    </li>
                    <li class="{{ Request::is('modules-chartjs') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-chartjs') }}">ChartJS</a>
                    </li>
                    <li class="{{ Request::is('modules-datatables') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-datatables') }}">DataTables</a>
                    </li>
                    <li class="{{ Request::is('modules-flag') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-flag') }}">Flag</a>
                    </li>
                    <li class="{{ Request::is('modules-font-awesome') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-font-awesome') }}">Font Awesome</a>
                    </li>
                    <li class="{{ Request::is('modules-ion-icons') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-ion-icons') }}">Ion Icons</a>
                    </li>
                    <li class="{{ Request::is('modules-owl-carousel') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-owl-carousel') }}">Owl Carousel</a>
                    </li>
                    <li class="{{ Request::is('modules-sparkline') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-sparkline') }}">Sparkline</a>
                    </li>
                    <li class="{{ Request::is('modules-sweet-alert') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-sweet-alert') }}">Sweet Alert</a>
                    </li>
                    <li class="{{ Request::is('modules-toastr') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-toastr') }}">Toastr</a>
                    </li>
                    <li class="{{ Request::is('modules-vector-map') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-vector-map') }}">Vector Map</a>
                    </li>
                    <li class="{{ Request::is('modules-weather-icon') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('modules-weather-icon') }}">Weather Icon</a>
                    </li>
                </ul>
            </li>

        </ul>

        <div class="hide-sidebar-mini mb-4 p-3 mt-auto">
            <a href="{{ route('logout') }}"
                class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </aside>
</div>
