<aside class="main-sidebar sidebar-dark-primary " style="min-height: 917px;">



    <!-- Brand Logo -->
    <a href="{{ route("admin.home") }}" class="brand-link">
        <div>
             <img src=" {{ asset("/img/unexpo2.png")}}" class="img-fluid" >
        </div>
        
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p> 
                            <span>Inicio</span>
                        </p>
                    </a>
                </li>

                    <li class="nav-item has-treeview {{ request()->is('admin/ticketsequipos*') ? 'menu-open' : '' }}   {{ request()->is('admin/eventos*') ? 'menu-open' : '' }} {{ request()->is('admin/ticketsadiestramiento*') ? 'menu-open' : '' }}  {{ request()->is('admin/ticketssoftwares*') ? 'menu-open' : '' }}{{ request()->is('admin/ticketsapoyo*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-tags"></i>
                            <p>
                                <span>Actividades</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                          
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketsequipos.create") }}" class="nav-link d-flex align-items-center {{ request()->is('admin/ticketsequipos') || request()->is('admin/ticketsequipos/*') ? 'active' : '' }}">
                                        <i class="fa fa-tools pr-2">

                                        </i>
                                        <p>
                                            <span>Reparación y <br> mantenimiento</span>
                                        </p>
                                    </a>
                                </li>
                           
                                
                                 <li class="nav-item">
                                    <a href="{{ route("admin.ticketssoftwares.create") }}" class="nav-link d-flex align-items-center {{ request()->is('admin/ticketssoftwares') || request()->is('admin/ticketssoftwares/*') ? 'active' : '' }}">
                                        <i class="fa fa-laptop-code pr-2">

                                        </i>
                                        <p> <span>Instalación y <br>desarrollo de Software</span>
                                           
                                        </p>
                                    </a>
                                </li>
                           
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketsapoyos.create") }}" class="nav-link {{ request()->is('admin/ticketsapoyos') || request()->is('admin/ticketsapoyos/*') ? 'active' : '' }}">
                                        <i class="fa fa-users-cog pr-2">

                                        </i>
                                        <p>
                                            <span>Apoyo Tecnico</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketsadiestramientos.create") }}" class="nav-link {{ request()->is('admin/ticketsadiestramientos') || request()->is('admin/ticketsadiestramientos/*') ? 'active' : '' }}">
                                        <i class="fa fa-book-reader pr-2">

                                        </i>
                                        <p>
                                            <span>Adiestramiento</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketseventos.create") }}" class="nav-link {{ request()->is('admin/ticketseventos') || request()->is('admin/ticketseventos/*') ? 'active' : '' }}">
                                        <i class="fa fa-handshake pr-2">

                                        </i>
                                        <p>
                                            <span>Eventos y Reuniones</span>
                                        </p>
                                    </a>
                                </li>
                            

                            
                        </ul>
                    </li>
               
                   @can('inventario_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/equipos*') ? 'menu-open' : '' }} {{ request()->is('admin/softwares*') ? 'menu-open' : '' }} {{ request()->is('admin/perifericos*') ? 'menu-open' : '' }}{{ request()->is('admin/caracteristicas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-clipboard-list"></i>
                            <p>
                                <span>Inventario</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">     
                             @can('equipo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipos.index") }}" class="nav-link {{ request()->is('admin/equipos') || request()->is('admin/equipos/*') ? 'active' : '' }}">
                                        <i class="fas fa-laptop">

                                        </i>
                                        <p>
                                            <span>Equipos</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('software_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.softwares.index") }}" class="nav-link {{ request()->is('admin/softwares') || request()->is('admin/softwares/*') ? 'active' : '' }}">
                                        <i class="fas fa-code">

                                        </i>
                                        <p>
                                            <span>Software</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                             @can('periferico_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.perifericos.index") }}" class="nav-link {{ request()->is('admin/perifericos') || request()->is('admin/perifericos/*') ? 'active' : '' }}">
                                        <i class="fas fa-microchip">

                                        </i>
                                        <p>
                                            <span>Perifericos</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            
                        </ul>
                    </li>
                @endcan
                @can('configuracion_tecnico_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fa fa-users-cog"></i>
                            <p>
                                <span>Gestion de T&eacute;cnicos</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fas fa-user">

                                        </i>
                                        <p>
                                            <span>T&eacute;cnicos</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>Roles</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>Permisos</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                
     @can('configuracion_general_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/areas*') ? 'menu-open' : '' }} {{ request()->is('admin/edificios*') ? 'menu-open' : '' }} {{ request()->is('admin/dependencias*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fa fa-users"></i>
                            <p>
                                <span>Configuraciones</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('tipo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tipos.index") }}" class="nav-link {{ request()->is('admin/tipos') || request()->is('admin/tipos/*') ? 'active' : '' }}">
                                        <i class="fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>Tipos</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('area_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.areas.index") }}" class="nav-link {{ request()->is('admin/areas') || request()->is('admin/areas/*') ? 'active' : '' }}">
                                        <i class="fas fa-cog">

                                        </i>
                                        <p>
                                            <span>Areas</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                             @can('dependencia_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dependencias.index") }}" class="nav-link {{ request()->is('admin/dependencias') || request()->is('admin/dependencias/*') ? 'active' : '' }}">
                                        <i class="fas fa-hotel">

                                        </i>
                                        <p>
                                            <span>Dependencias</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('edificio_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.edificios.index") }}" class="nav-link {{ request()->is('admin/edificios') || request()->is('admin/edificios/*') ? 'active' : '' }}">
                                        <i class="fas fa-building">

                                        </i>
                                        <p>
                                            <span>Edificios</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('cliente_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.clientes.index") }}" class="nav-link">
                            <i class="fa fa-user-tie">

                            </i>
                            <p>
                                <span>Usuarios</span>
                            </p>
                        </a>
                    </li>
                @endcan 
                @can('user_action_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.useractions.index") }}" class="nav-link }}">
                            <i class="fa fa-user-tie">

                            </i>
                            <p>
                                <span>Acciones de los Tecnicos</span>
                            </p>
                        </a>
                    </li>
                @endcan  
                <li class="nav-item">                               
                    <a class="nav-link " href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt">             
                         </i>
                         <p>
                            <span>Salir</span>
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li> 
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>