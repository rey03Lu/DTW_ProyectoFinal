
<aside class="main-sidebar elevation-4 d-flex flex-column" style="background-color: #426E55; height: 100vh;">

    <a href="#" class="brand-link" style="background-color: #2D4839; color: white;">
        <img src="{{ asset('images/amanecer.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8;">
        <span class="brand-text font-weight-bold">DIA</span>
    </a>

    <div class="sidebar flex-grow-1 overflow-auto">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                
                @can('sidebar.roles.y.permisos')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-edit"></i>
                        <p>
                            Roles y Permisos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rol y Permisos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.permisos.index') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuario</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tareas.index') }}" target="frameprincipal">
                        <i class="fas fa-tasks"></i>
                        <p>Tareas</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</aside>

<!-- Estilos del Sidebar -->
<style>
    .main-sidebar {
        background-color: #426E55 !important;
    }
    .main-sidebar .brand-link {
        background-color: #2D4839 !important;
    }

    .main-sidebar .nav-link,
    .main-sidebar .nav-link p,
    .main-sidebar .brand-text,
    .main-sidebar .nav-icon,
    .main-sidebar .fa,
    .main-sidebar .far,
    .main-sidebar .fas {
        color: #ffffff !important;
    }

    .main-sidebar .nav-link:hover {
        background-color: #73986F !important;
        color: #ffffff !important;
    }

    .main-sidebar .nav-link.active {
        background-color: #73986F !important;
        color: #ffffff !important;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
