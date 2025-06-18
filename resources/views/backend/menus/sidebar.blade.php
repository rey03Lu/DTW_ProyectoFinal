<aside class="main-sidebar elevation-4 d-flex flex-column" style="background-color: #426E55; height: 100vh;">

    <a href="#" class="brand-link" style="background-color: #2D4839; color: white;">
        <img src="{{ asset('images/amanecer.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8;">
        <span class="brand-text font-weight-bold">DIA</span>
    </a>

    <div class="sidebar flex-grow-1 overflow-auto">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="true">

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
                <li class="nav-item">
                    <a href="{{ route('nasaApod.dashboard') }}" target="frameprincipal" class="nav-link">
                        <i class="fas fa-globe"></i>
                        <p>API NASA</p>
                    </a>

                </li>
            </ul>
        </nav>
    </div>

    <!-- Footer Sidebar: para tener lo del navbar aqui -->
    <div class="sidebar-footer p-2 mt-auto" style="margin-bottom: 20px;">
        <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.perfil') }}" target="frameprincipal" class="nav-link text-white">
                    <i class="fas fa-user"></i>
                    <p>Editar Perfil</p>
                </a>
            </li>
            <li class="nav-item">
                <!-- Botón que abre el popup de confirmacion de salida -->
                <a href="#" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Cerrar Sesión</p>
                </a>
            </li>
        </ul>
    </div>

</aside>

<!-- Formulario oculto para cerrar sesion -->
<form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- POPUP de Cierre de Sesión -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Cierre de Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea cerrar sesión?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmLogoutBtn">Cerrar Sesión</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para enviar el logout al confirmar -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('confirmLogoutBtn').addEventListener('click', function() {
            document.getElementById('frm-logout').submit();
        });
    });
</script>

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
