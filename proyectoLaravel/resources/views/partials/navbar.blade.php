
<nav class="navbar navbar-expand-lg navColor">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}" style="color:white"><img src="https://img.icons8.com/coffee/" class="img-radius" alt="User-Profile-Image"> Red Velvet</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                @if (Auth::check() && Auth::user()->roles->contains(1))
                    <li class="nav-item {{  Request::is('/listado/create') ? 'active' : ''}}">
                        <a class="nav-link navText" href="{{url('/listado/create')}}">
                            Nuevo producto
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('/listado/user') ? 'active' : ''}}">
                        <a class="nav-link  navText" href="{{url('/listado/user')}}">
                            Gestionar usuarios
                        </a>
                @endif
                    @if(Auth::check() && Auth::user()->roles->contains(2))

                        <li class="nav-item {{  Request::is('/listado/user/cesta') ? 'active' : ''}}">
                            <a class="nav-link  navText" href="{{url('/listado/user/cesta/'.Auth::id())}}">
                                Ver cesta
                            </a>
                        </li>
                        <li class="nav-item {{  Request::is('/listado/user/historial') ? 'active' : ''}}">
                            <a class="nav-link  navText" href="{{url('/listado/user/historial/'.Auth::id())}}">
                                Ver historial
                            </a>
                        </li>
                    @endif
                </ul>

        @if(Auth::check() )
                <ul class="navbar-nav navbar-right">
                    @if(Auth::check() && Auth::user()->roles->contains(2))
                        <li class="nav-item">
                            <a class="nav-link  navText" href="{{url('/listado/user/miCuenta/')}}">
                                Mi cuenta
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link  navText" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
        @if(!Auth::check() )
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link navText" href="{{url('/login')}}">
                        Logearse
                    </a>
                </li>
            </ul>
    </div>
    @endif
    </div>
</nav>
