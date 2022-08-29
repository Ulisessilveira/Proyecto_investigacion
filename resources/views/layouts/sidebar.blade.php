<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #4B0082" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <!--i class="fas fa-fw fa-file"></i-->
        <img src="http://drive.google.com/uc?export=view&id=1HHksJ1OnFdwfVB2urgnEJemSPE2FQLSG" width="60" height="40">
        <div class="sidebar-brand-text mx-3">ITSNCG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-home"></i>
            <span>Inicio</span></a>
    </li>
    <hr class="sidebar-divider">
    @if(Auth::user()->nivel == 'Admin')
        <!-- Usuarios -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/usuarios">
                <i class="fas fa-fw fa-users"></i>
                <span>Administración de usuarios</span>
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="/users/docentes">
            <i class="fas fa-fw fa-users"></i>
            <span>Docentes</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/users/alumnos">
            <i class="fas fa-fw fa-users"></i>
            <span>Alumnos</span>
        </a>
    </li>
    <!-- Proyectos -->
    <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="/proyectos/agregar_proyecto">
                <i class="fas fa-fw fa-file"></i>
                <span>Crear proyecto</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/proyectos/proyecto_documentacion">
                <i class="fas fa-fw fa-folder"></i>
                <span>Proyecto documentación</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/proyectos/consultar_proyectos">
                <i class="fas fa-fw fa-archive"></i>
                <span>Consulatar proyecto</span>
            </a>
        </li>
        <!-- Sidebar Toggler (Sidebar) -->
        <hr class="sidebar-divider">
        <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>