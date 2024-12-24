<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('pasien.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Poliklinik</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Menu Dashboard -->
    <li class="nav-item {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pasien.dashboard') }}">
            <i class="fas fa-home"></i>
            <span class="ml-2">Dashboard</span>
        </a>
    </li>

    <!-- Menu Buat Janji -->
    <li class="nav-item {{ request()->routeIs('pendaftaran.poli') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pendaftaran.poli') }}">
            <i class="fas fa-calendar-check"></i>
            <span class="ml-2">Buat Janji</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
