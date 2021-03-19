<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#000000;">


            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->tipo_usuario)
                        <a class="navbar-brand" href="{{ url('/') }}">Ok</a>
                    @else
                        <a class="navbar-brand" style="color:white">Proyección salarial</a>
                      <!--  <a class="navbar-brand" href="{{ url('/') }}">Home</a>-->
                    @endif
                @else
                    <a class="navbar-brand">Proyección salarial</a>
                @endif
            @endguest
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (Route::has('login'))
                    @auth

                        <ul class="nav justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:yellow;background:#1f648b">
                                   <!-- {{ Auth::user()->email }} --> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @if (!Auth::user()->tipo_usuario)
                                        <a class="dropdown-item" href="{{ route('empleado.index') }}">Empleados</a>
                                    @endif
                                    <br>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ config('textos.logout') }} Salir
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>

                            </li>
                        </ul>
                    @else
                        <ul class="nav justify-content-end">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Iniciar sesión </a></li> 
                            <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                        </ul>
                    @endif
                @endguest
            </div>
        </nav>


        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')
</body>
</html>
