<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vitalyc</title>

    <!-- Styles -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">


    <link href="{{asset('/css/font-awesome.css')}}" rel="stylesheet">

    <link href= "{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome CSS -->

    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="{{asset('css/material.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/ripples.min.css')}}"rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <Link href = "https://file.myfontastic.com/yDauQVtFyBxnLvwmgreRsM/icons.css" rel = "stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       Vitalyc
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            @if(Auth::user()->roles[0]->hasPermissionTo('ModuloRoles') or Auth::user()->can('ModuloRoles'))
                            <li><a href="{{ url('/usuarios') }}">Usuarios</a></li>
                            @endif
                                @if(Auth::user()->roles[0]->hasPermissionTo('ModuloRoles') or Auth::user()->can('ModuloRoles'))
                            <li><a href="{{ url('/roles') }}">Roles</a></li>
                                @endif
                                @if(Auth::user()->roles[0]->hasPermissionTo('ModuloPermisos') or Auth::user()->can('ModuloPermisos'))
                            <li><a href="{{ url('/permisos') }}">Permisos</a></li>
                                @endif
                                @if(Auth::user()->roles[0]->hasPermissionTo('ModuloMedicina') or Auth::user()->can('ModuloMedicina'))
                            <li><a href="{{ url('/medicinas') }}">Medicinas</a></li>
                                @endif
                                @if(Auth::user()->roles[0]->hasPermissionTo('ModuloEspecialidades') or Auth::user()->can('ModuloEspecialidades'))
                            <li><a href="{{ url('/especialidades') }}">Especialidades</a></li>
                                @endif
                                @if(Auth::user()->roles[0]->hasPermissionTo('ModuloPacientes') or Auth::user()->can('ModuloPacientes'))
                            <li><a href="{{ url('/Pacientes') }}">Historial Medico de Pacientes</a></li>
                                @endif
                                @if(Auth::user()->roles[0]->hasPermissionTo('ModuloSecretaria') or Auth::user()->can('ModuloSecretaria'))
                            <li><a href="{{ url('/cita') }}">Citas</a></li>
                                    @endif

                            <li><a href="{{ url('/home') }}">Inicio</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombre." ".Auth::user()->apellido }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>

                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <script type="application/javascript">
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.form-delete').attr('action', $(e.relatedTarget).data('action'));
            $(this).find('.nombre').text($(e.relatedTarget).data('name'));
        });
    </script>
</body>
</html>



