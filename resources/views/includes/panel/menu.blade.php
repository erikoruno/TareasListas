<div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div " >
        
        <div class="">
            <div class="main-menu-header">
                <img class="img-radius" src="{{ asset('images/user/user1.jpg')}}" alt="User-Profile-Image">
                <div class="user-details">
                    @auth
                    <div id="more-details">{{ auth()->user()->name}} <i class="fa fa-caret-down"></i></div>
                    @endauth
                </div>
            </div>
            <div class="collapse" id="nav-user-link">
                <ul class="list-unstyled">
                    <li class="list-group-item">
                        <a href="user-profile.html">
                            <i class="feather icon-user m-r-5">
                            </i>Ver Perfil
                            </a>
                    </li>
                    {{-- <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li> --}}
                    <li class="list-group-item">
                        <a href="{{ route('logout')}}"
                            onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
                        >
                            <i class="feather icon-log-out m-r-5">
                                </i>Salir de sesión
                        </a>
                        <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        
        <ul class="nav pcoded-inner-navbar ">
            <li class="nav-item pcoded-menu-caption">
                <label>Navegación</label>
            </li>

            <li class="nav-item">
                <a href="{{ url('/tareas/create')}}" class="nav-link ">
                    <span class="pcoded-micon"><i class="fas fa-plus"></i>
                    </span><span class="pcoded-mtext">Añadir Tarea</span></a>
            </li>
            <li class="nav-item">
                <a href="index.html" class="nav-link ">
                    <span class="pcoded-micon"><i class="fas fa-search"></i>
                    </span><span class="pcoded-mtext">Buscador</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/tareas')}}" class="nav-link ">
                    <span class="pcoded-micon"><i class="fas fa-receipt"></i>
                    </span><span class="pcoded-mtext">Bandeja de entrada</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.html" class="nav-link ">
                    <span class="pcoded-micon"><i class="far fa-calendar"></i>
                    </span><span class="pcoded-mtext">Hoy</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.html" class="nav-link ">
                    <span class="pcoded-micon"><i class="far fa-calendar-alt"></i>
                    </span><span class="pcoded-mtext">Próximo</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="index.html" class="nav-link ">
                    <span class="pcoded-micon"><i class="fa fa-th-large"></i>
                    </span><span class="pcoded-mtext">Filtros y Etiquetas</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Page layouts</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="layout-vertical.html" target="_blank">Vertical</a></li>
                    <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li>
                </ul>
            </li> --}}
            <li class="nav-item pcoded-menu-caption">
                <label>Extras</label>
            </li>
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Mis proyectos</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="bc_alert.html">Alert</a></li>
                    <li><a href="bc_button.html">Button</a></li>
                    <li><a href="bc_badges.html">Badges</a></li>
                    <li><a href="bc_breadcrumb-pagination.html">Breadcrumb & paggination</a></li>
                    <li><a href="bc_card.html">Cards</a></li>
                    <li><a href="bc_collapse.html">Collapse</a></li>
                    <li><a href="bc_carousel.html">Carousel</a></li>
                    <li><a href="bc_grid.html">Grid system</a></li>
                    <li><a href="bc_progress.html">Progress</a></li>
                    <li><a href="bc_modal.html">Modal</a></li>
                    <li><a href="bc_spinner.html">Spinner</a></li>
                    <li><a href="bc_tabs.html">Tabs & pills</a></li>
                    <li><a href="bc_typography.html">Typography</a></li>
                    <li><a href="bc_tooltip-popover.html">Tooltip & popovers</a></li>
                    <li><a href="bc_toasts.html">Toasts</a></li>
                    <li><a href="bc_extra.html">Other</a></li>
                </ul>
            </li>
                     
            {{-- <li class="nav-item">
            <a href="{{ route('logout')}}" class="nav-link "
                onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
            >
                <span class="pcoded-micon"><i class="fas fa-sign-in-alt"></i>
                </span><span class="pcoded-mtext">Salir de la sesión</span>
            </a>
                <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout">
                    @csrf
                </form>
            </li> --}}

        </ul>
        
        {{-- <div class="card text-center">
            <div class="card-block">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="feather icon-sunset f-40"></i>
                <h6 class="mt-3">Download Pro</h6>
                <p>Getting more features with pro version</p>
                <a href="https://1.envato.market/qG0m5" target="_blank" class="btn btn-primary btn-sm text-white m-0">Upgrade Now</a>
            </div>
        </div> --}}
        
    </div>
</div>