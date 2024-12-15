<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <!-- Ikon Poliklinik -->
            <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Poliklinik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">MASTER DATA</div>

    <!-- Data Pasien Menu -->
    <li class="nav-item {{ request()->routeIs('data.pasien') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data.pasien') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pasien</span>
        </a>
    </li>

    <!-- Data Dokter Menu -->
    <li class="nav-item {{ request()->routeIs('data.dokter') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data.dokter') }}">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Data Dokter</span>
        </a>
    </li>

    <!-- Data Poliklinik Menu -->
    <li class="nav-item {{ request()->routeIs('poliklinik') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('poliklinik') }}">
            <i class="fas fa-fw fa-clinic-medical"></i>
            <span>Data Poliklinik</span>
        </a>
    </li>

    <!-- Data Obat Menu -->
    <li class="nav-item {{ request()->routeIs('data.obat') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data.obat') }}">
            <i class="fas fa-fw fa-pills"></i>
            <span>Data Obat</span>
        </a>
    </li>

    {{-- <!-- Periksa Menu (Jika diperlukan di masa depan) -->
    <div class="sidebar-heading">Periksa</div>
    <li class="nav-item {{ request()->routeIs('periksa') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('periksa') }}">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Periksa</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
