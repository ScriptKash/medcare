<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">MedCare</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ (request()->is('medicos', 'crear-medico') ? 'has-sub sidebar-group-active open' : '' )}}"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Dashboard">Medicos</span></a>
                    <ul class="menu-content">
                        <li class="{{ (request()->is('medicos')) ? 'active' : '' }}"><a href="/medicos"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Ver médicos</span></a>
                        </li>
                        @if(Auth::check() && Auth::user()->idroles == 3)
                        <li class="{{ (request()->is('crear-medico')) ? 'active' : '' }}"><a href="/crear-medico"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Crear médico</span></a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item {{ (request()->is('centros-salud') ? 'has-sub sidebar-group-active open' : '' )}}"><a href="#"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Centros de Salud</span></a>
                    <ul class="menu-content">
                        <li class="{{ (request()->is('centros-salud')) ? 'active' : '' }}"><a href="/centros-salud"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Ver centros de salud</span></a>
                        </li>
                        @if(Auth::check() && Auth::user()->idroles == 3)
                        <li class="{{ (request()->is('crear-centro-salud')) ? 'active' : '' }}"><a href="/crear-centro-salud"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Crear centro de salud</span></a>
                        </li>
                        @endif
                        </li>
                    </ul>
                </li>
                @auth
                <li class="nav-item {{ (request()->is('atenciones')) ? 'active' : '' }}"><a href="{{ route('atencion.index') }}"><i class="feather icon-file-text"></i><span class="menu-title" data-i18n="Atenciones médicas">Atenciones médicas</span></a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->