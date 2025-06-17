
<nav class="main-header navbar navbar-expand border-bottom navbar-dark" style="background-color: #426E55;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="color: white; font-weight: bold;">
                <!--{{ $titulo ?? 'Panel'}}-->
            </a>
        </li>
    </ul>
<!--
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cogs" style="color: white"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px; background-color: #73986F; color: white;">
                <a href="{{ route('admin.perfil') }}" target="frameprincipal" class="dropdown-item" style="color: white;">
                    <i class="fas fa-user mr-2"></i> Editar Perfil
                </a>
                <div class="dropdown-divider" style="border-top: 1px solid #EED4DB;"></div>

                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item" style="color: white;">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                </a>

                <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
-->
</nav>
