<div class="navbar-fixed">
    <nav class="indigo darken-4">
        <div class="container">
            <div class="nav-wrapper">

                <a href="{{ route('home') }}" class="brand-logo">
                    @if(isset($navbarsettings[0]) && $navbarsettings[0]['name'])
                        {{ $navbarsettings[0]['name'] }}
                    @else
                        INMUEBLES AL TOQUE
                    @endif
                    <i class="material-icons left">location_city</i>
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                
                <ul class="right hide-on-med-and-down">
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Inicio</a>
                    </li>

                    <li class="{{ Request::is('property*') ? 'active' : '' }}">
                        <a href="{{ route('property') }}">Propiedades</a>
                    </li>

                    <li class="{{ Request::is('agents*') ? 'active' : '' }}">
                        <a href="{{ route('agents') }}">Agentes</a>
                    </li>

                    <li class="{{ Request::is('gallery') ? 'active' : '' }}">
                        <a href="{{ route('gallery') }}">Galeria</a>
                    </li>

                    <li class="{{ Request::is('blog*') ? 'active' : '' }}">
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>

                    <li class="{{ Request::is('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">Contacto</a>
                    </li>

                    @guest
                        <li><a href="{{ route('login') }}"><i class="material-icons">input</i></a></li>
                        <li><a href="{{ route('register') }}"><i class="material-icons">person_add</i></a></li>
                    @else
                        <li>
                                @if(Auth::user()->role->id == 1)
                                    <a href="{{ route('admin.dashboard') }}">
                                        ({{ ucfirst(Auth::user()->username) }})
                                    </a>
                                @elseif(Auth::user()->role->id == 2)
                                    <a href="{{ route('agent.dashboard') }}">
                                        ({{ ucfirst(Auth::user()->username) }})
                                    </a>
                                @elseif(Auth::user()->role->id == 3)
                                    <a href="{{ route('user.dashboard') }}">
                                        ({{ ucfirst(Auth::user()->username) }})
                                    </a>
                                @endif
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="material-icons">power_settings_new</i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    
    <ul class="sidenav" id="mobile-demo">
        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ route('home') }}">Inicio</a>
        </li>

        <li class="{{ Request::is('login') ? 'active' : '' }}">
            <a href="{{ route('login') }}">Iniciar Sesion</a>
        </li>

        <li class="{{ Request::is('register') ? 'active' : '' }}">
            <a href="{{ route('register') }}">Registrarse</a>
        </li>

        <li class="{{ Request::is('property*') ? 'active' : '' }}">
            <a href="{{ route('property') }}">Propiedades</a>
        </li>

        <li class="{{ Request::is('agents*') ? 'active' : '' }}">
            <a href="{{ route('agents') }}">Agentes</a>
        </li>

        <li class="{{ Request::is('gallery') ? 'active' : '' }}">
            <a href="{{ route('gallery') }}">Galeria</a>
        </li>

        <li class="{{ Request::is('blog*') ? 'active' : '' }}">
            <a href="{{ route('blog') }}">Blog</a>
        </li>

        <li class="{{ Request::is('contact') ? 'active' : '' }}">
            <a href="{{ route('contact') }}">Contacto</a>
        </li>
    </ul>

</div>