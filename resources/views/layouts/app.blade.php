<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/zoom.js') }}" defer></script>  
    <script src="{{ asset('js/imagen.js') }}" defer></script>  
    <script src="{{ asset('js/video.js') }}" defer></script>
     
    
  
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/zoom.css') }}" rel="stylesheet">

    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="shortcut icon" href="/images/default/otakupink.png">
</head>
<body class="white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel blue">
            <div class="container">
                <a class="navbar-brand" href="/articles">
                    <!-- {{ config('app.name', 'Inicio') }} -->
                    <h2>ニューオタク</h2>
                    
                </a>
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       <!-- BUSCADOR     -->
                        <div class="box">
                            <div class="container-4">
                                <form action="{{ route('buscar') }}" method="POST">
                                    @csrf
                                    <span class="icon"><i class="fa fa-search"></i></span>
                                    <input name="buscarDato" type="search" id="search" placeholder="Search..." required/>
                                    <button type="submit" class="icon"><i class="fa fa-search"><img style="height: 40px; width: 40px; background-color:#EFEFEF;" class=" card d-block" src="/images/default/buscar.jpg" alt="Card image cap"></i></button>                                   
                                </form>
                            </div>
                        </div>
                            
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item container">
                                     <a class="nav-link" href="/"><h5>{{ __('Inicio') }}</h5></a>
                            </li>
                            <li class="nav-item container">
                                     <a class="nav-link" href="/anime"><h5>{{ __('Anime') }}</h5></a>
                            </li>                            
                            <li class="nav-item container">
                                     <a class="nav-link" href="/videojuegos"><h5>{{ __('Games') }}</h5></a>
                            </li>
                            <li class="nav-item container">
                                     <a class="nav-link" href="/noticias"><h5>{{ __('News') }}</h5></a>
                            </li>
                            <!-- IMAGEN USUARIO -->
                            @if(Auth::user())
                                @if(Auth::user()->avatar)
                                    <li class="nav-item container">
                                        <img style="height: 40px; width: 40px; background-color:#EFEFEF;" class="rounded-circle card d-block" src="/images/avatar/{{ Auth::user()->avatar }}" alt="Card image cap">
                                    </li> 
                                @else
                                    <li class="nav-item container">
                                        <img style="height: 40px; width: 40px; background-color:#EFEFEF;" class="rounded-circle card d-block" src="/images/default/naruto.png" alt="Card image cap">
                                    </li> 
                                @endif    
                            @endif                            
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link card" href="{{ route('login') }}">{{ __('Inicio') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link card" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"  class="nav-link dropdown-toggle card" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <h5>{{ Auth::user()->user }}</h5> <span class="caret"></span>
                                </a>
                                
                                <!-- MENU DE USUARIO -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->rol == "administrador")
                                    <a class="dropdown-item" href="{{ route('create') }}">
                                        {{ __('Crear') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('showarticle') }}">
                                        {{ __('Lista Art') }}
                                    </a>
                                    <a class="dropdown-item" href="/usuarios">
                                        {{ __('Lista usuarios') }}
                                    </a>
                                   @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container" >
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('js/eliminarArticulo.js') }}" defer></script>  
</body>
</html>
