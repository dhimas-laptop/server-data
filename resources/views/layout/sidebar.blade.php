<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img
            src="{{ asset('img/logo.png') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
            <span class="brand-text font-weight-light">SiPuDa</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="https://mail.bpdas-sjd.id/" class="d-block" target="_blank">
                        <i class="fa-solid fa-mail-bulk"></i>
                        BPDAS Mail</a>
                </div>
            </div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="https://cloud.bpdas-sjd.id/" class="d-block" target="_blank">
                        <i class="fa-solid fa-cloud"></i>
                        BPDAS Drive</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any
                    other icon font library -->
                    <li class="nav-item">
                        <a
                            href="/dashboard"
                            class="nav-link {{ ($active === 'dashboard') ? 'active' : '' }}">
                            <i class="fa-solid fa-house-chimney-window"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="/Pengguna"
                            class="nav-link {{ ($active === 'pengguna') ? 'active' : '' }}">
                            <i class="fa-solid fa-users"></i>
                            <p>
                                Pengguna
                            </p>
                        </a>
                    </li>
                    <li
                        class="nav-item @if ($active === '524114' || $active === '524119' || $active === 'tahun' || $active === 'perjalanan-dinas') menu-open @endif">
                        <a
                            href="/bibit"
                            class="nav-link @if ($active === '524114' || $active === '524119' || $active === 'tahun' || $active === 'perjalanan-dinas' ) active @endif">
                            <i class="fa-solid fa-plane-departure"></i>
                            <p>
                                Perjalanan Dinas
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a
                                    href="{{ route('tahun') }}"
                                    class="nav-link {{ ($active === 'tahun') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === 'tahun') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>524111</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('524114') }}"
                                    class="nav-link {{ ($active === '524114') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === '524114') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>524114</p>
                                </a>
                            </li>
                            @can('admin')
                            <li class="nav-item">
                                <a 
                                    href="{{ route('524119') }}"
                                    class="nav-link {{ ($active === '524119') ? 'active' : '' }}">
                                    <i class="far {{ ($active === '524119') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>524119</p>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>

                    @can('admin')
                    <li class="nav-item">
                        <a
                            href="/matriks"
                            class="nav-link {{ ($active === 'matriks') ? 'active' : '' }}">
                            <i class="fa-solid fa-calendar-check"></i>
                            <p>
                                Matriks Perjadin
                            </p>
                        </a>
                    </li>
                    @endcan 
                    @can('admin')
                    <li
                        class="nav-item @if($active === 'data-bibit' || $active === 'data-order') menu-open @endif">
                        <a
                            href=""
                            class="nav-link @if($active === 'data-bibit' || $active === 'data-order') active @endif">
                            <i class="fa-solid fa-seedling"></i>
                            <p>
                                Bibit
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a
                                    href="/data-bibit"
                                    class="nav-link {{ ($active === 'data-bibit') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === 'data-bibit') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>Data Bibit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="/data-order"
                                    class="nav-link {{ ($active === 'data-order') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === 'data-order') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>Data Pesanan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan @can('admin')
                    <li
                        class="nav-item @if($active === 'curah_hujan' || $active === 'tma' || $active === 'debit_air' || $active === 'grafik') menu-open @endif">
                        <a
                            href=""
                            class="nav-link @if($active === 'curah_hujan' || $active === 'tma' || $active === 'debit_air' || $active === 'grafik') active @endif">
                            <i class="fa-solid fa-droplet"></i>
                            <p>
                                Tata Air
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a
                                    href="{{ route('curah_hujan') }}"
                                    class="nav-link {{ ($active === 'curah_hujan') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === 'curah_hujan') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>Curah Hujan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('tma') }}"
                                    class="nav-link {{ ($active === 'tma') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === 'tma') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>Tinggi Muka Air</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('debit_air') }}"
                                    class="nav-link {{ ($active === 'debit_air') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === 'debit_air') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>Debit Air</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('grafik') }}"
                                    class="nav-link {{ ($active === 'grafik') ? 'active' : '' }}">
                                    <i
                                        class="far {{ ($active === 'grafik') ? 'fa-circle-check' : 'fa-circle' }} nav-icon"></i>
                                    <p>Grafik</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>