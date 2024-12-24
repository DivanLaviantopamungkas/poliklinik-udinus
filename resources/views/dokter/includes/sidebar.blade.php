<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Poliklinik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dokter.dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('periksa.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('periksa.index') }}">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Pemeriksaan</span>
        </a>
    </li>


    <!-- Input jAdwal -->
    <li class="nav-item {{ request()->routeIs('dokter.jadwal.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dokter.jadwal.index') }}">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Input Jadwal</span>
        </a>
    </li>

    <!-- Menu Riwayat -->
    <li class="nav-item {{ request()->routeIs('riwayat.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('riwayat.index') }}">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat Pemeriksaan</span>
        </a>
    </li>


    <!-- Profile Management -->
    <li class="nav-item {{ request()->routeIs('profile.dokter.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('profile.dokter.edit') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Profile Management</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
