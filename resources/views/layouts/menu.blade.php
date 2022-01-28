<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fa-solid fa-briefcase"></i>
    </div>
    <div class="sidebar-brand-text mx-3">bussiness</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('sales.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Cuentas</span>
    </a>
    <a class="nav-link" href="{{ route('storage.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Productos</span>
    </a>
    <a class="nav-link" href="{{ route('category.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Categorias</span>
    </a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->