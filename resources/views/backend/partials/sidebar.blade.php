<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SP CF</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('/dashboard') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <li class="nav-item {{ Request::segment(1) === 'data-penyakit' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('/data-penyakit') }}">
            <i class="fas fa-bug"></i>
            <span>Data Penyakit</span></a>
    </li>

    <li class="nav-item {{ Request::segment(1) === 'data-gejala' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('/data-gejala') }}">
            <i class="fas fa-vial"></i>
            <span>Data Gejala</span></a>
    </li>

    <li class="nav-item {{ Request::segment(1) === 'data-aturan' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('/data-aturan') }}">
            <i class="fas fa-recycle"></i>
            <span>Data Aturan</span></a>
    </li>

    <li class="nav-item {{ Request::segment(1) === 'data-riwayat' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('/data-riwayat') }}">
            <i class="far fa-clock"></i>
            <span>Data Riwayat</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item {{ Request::segment(1) === 'ubah-password' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('/ubah-password') }}">
            <i class="fas fa-lock"></i>
            <span>Ubah Password</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
