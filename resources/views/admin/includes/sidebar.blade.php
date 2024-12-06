<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <!-- Ikon yang diganti menjadi fa-hospital -->
            <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Poliklinik</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Data Pasien Menu -->
    <div class="sidebar-heading">Data Pasien</div>

    <li class="nav-item {{ request()->routeIs('data.pasien') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data.pasien') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pasien</span>
        </a>
    </li>

    <!-- Data Dokter Menu -->
    <div class="sidebar-heading">Data Dokter</div>

    <li class="nav-item {{ request()->routeIs('data.dokter') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data.dokter') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Dokter</span>
        </a>
    </li>

    <!-- Data Poliklinik Menu -->
    <div class="sidebar-heading">Data Poliklinik</div>

    <li class="nav-item {{ request()->routeIs('poliklinik') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('poliklinik') }}">
            <i class="fas fa-fw fa-hospital"></i>
            <span>Data Poliklinik</span>
        </a>
    </li>

    <!-- Data Obat Menu -->
    <div class="sidebar-heading">Data Obat</div>

    <li class="nav-item {{ request()->routeIs('data.obat') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data.obat') }}">
            <i class="fas fa-fw fa-pills"></i>
            <span>Data Obat</span>
        </a>
    </li>
    {{-- 
    <!-- Periksa Menu -->
    <div class="sidebar-heading">Periksa</div>

    <li class="nav-item ">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Periksa</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
