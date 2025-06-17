<aside class="main-sidebar elevation-4" style="background-color: #79CAFF;">
    <a href="#" class="brand-link" style="background-color: #9DD7FD;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight" style="color: white">PANEL DE CONTROL</span>
    </a>

    <div class="sidebar">

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

<style>
/* Texto e iconos en blanco */
.main-sidebar .nav-link,
.main-sidebar .nav-link p,
.main-sidebar .brand-text,
.main-sidebar .nav-icon,
.main-sidebar .fa,
.main-sidebar .far,
.main-sidebar .fas {
    color: white !important;
}

/* Hover con color más claro */
.main-sidebar .nav-link:hover {
    background-color: #9DD7FD !important;
    color: white !important;
}
</style>
