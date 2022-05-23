<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <header>
        <div class="flex flex-wrap py-2">
            <div class="w-full px-4">
                <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-blue-500 rounded">
                    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                        <div class="w-full relative flex justify-between lg:w-auto px-4 lg:static lg:block lg:justify-start">
                            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="#pablo">
                                pink Menu
                            </a>
                            <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button">
                                <span class="block relative w-6 h-px rounded-sm bg-white"></span>
                                <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                                <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                            </button>
                        </div>
                        <div class="flex lg:flex-grow items-center" id="example-navbar-info">
                            <ul class="flex flex-col lg:flex-row list-none ml-auto">
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 a-menu">
                                        Director
                                    </a>
                                    <div class="absolute div-hidden hidden">
                                        <ul class="flex flex-col list-none ml-auto bg-green-500">
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/sesion">
                                                    Inicio de sesión
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/data/modifyData">
                                                    Modificar datos personales
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/director/addAsesor">
                                                    Agregar asesores 
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/director/deleteAsesor">
                                                    Eliminar Asesores
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 a-menu">
                                        Asesor
                                    </a>
                                    <div class="absolute div-hidden hidden">
                                        <ul class="flex flex-col list-none ml-auto bg-green-500">
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/asesor/addUsuario">
                                                    Registrar Tutor o Practicante 
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/asesor/asignarTutor">
                                                    Asignar tutor 
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/asesor/groupPract">
                                                    Agrupar practicante  
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/asesor/actividadnueva">
                                                    Crear actividades 
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/asesor/respuesta">
                                                    Crear respuestas 
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/asesor/actividadToCuadernillo/view">
                                                    Agregar actividades a cuadernillo 
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/asesor/actividadLeccion">
                                                    Asignar lecciones a actividades
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 a-menu">
                                        Tutor
                                    </a>
                                    <div class="absolute div-hidden hidden">
                                        <ul class="flex flex-col list-none ml-auto bg-green-500">
                                            <li class="nav-item">
                                            </li>
                                            <li class="nav-item">
                                            </li>
                                            <li class="nav-item">
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 a-menu">
                                        Practicante
                                    </a>
                                    <div class="absolute div-hidden hidden">
                                        <ul class="flex flex-col list-none ml-auto bg-green-500">
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/practicante/showActivity/1">
                                                    Mostrar actividad
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#">
                                                    Responder actividades
                                                </a> 
                                            </li>
                                            <li class="nav-item">
                                                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#">
                                                    Navegar en el cuadernillo
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    {{--Nombre del usuario--}}
                                    @if (auth()->check())
                                        <div class="inline">
                                            <form action="{{action('sesionController@logout')}}" method="GET" id="frmLogout">
                                                <input id="cerrarSesion" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 bg-red-600 rounded-md" type="button" value="Cerrar Sesión">
                                            </form>
                                            {{-- <a id="cerrarSesion" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 bg-red-600 rounded-md" >Cerrar sesión</a> --}}
                                            {{-- <button type="button" id="cerrarSesion" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 bg-red-600 rounded-md">
                                                Cerrar sesión
                                            </button> --}}
                                        </div>
                                    @endif
                                    {{--Cerrar sesión--}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        {{---<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>--}}
    </header>
    <body>
        @yield('body')
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.a-menu').on('click', function(){
            $('.absolute').addClass('hidden').removeClass('block');
            if($(this).parent().find('.div-hidden').hasClass("hidden"))
            {
                $(this).parent().find('.div-hidden').removeClass("hidden").addClass("block");
            }
            else
            {
                $(this).parent().find('.div-hidden').addClass("hidden");
            }
        });

        $(document).ready(function(){
            $('#cerrarSesion').on('click', function(){
                Swal({
                    title:"¿Desea cerrar sesión?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    confirmButtonText: 'Confirmar',
                }).then((willDelete) => {
                    if (willDelete) {
                        //document.getElementById('cerrarSesion').href = '{{action('sesionController@logout')}}';
                        document.forms["frmLogout"].submit();
                    }
                });
            });
        });
    </script>
    @yield('scripts')
</html>
