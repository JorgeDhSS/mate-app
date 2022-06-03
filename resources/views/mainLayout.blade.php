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
                <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-white rounded">
                    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                            @if (auth()->check())
                                <a href="{{route('data.modifyData')}}" class="inline-block mr-4 mt-2 content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="text-blue-600" viewBox="0 0 15 15">
                                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                    </svg>                                      
                                </a>
                                <h3 class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-blue-600">
                                    Mate-App
                                </h3>
                            @else
                                <h3 class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-blue-600">
                                    Mate-App
                                </h3>
                            @endif
                            <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button">
                                <span class="block relative w-6 h-px rounded-sm bg-white"></span>
                                <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                                <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
                            </button>
                        </div>
                        @if (auth()->check())
                        <div class="flex lg:flex-grow items-center text-center" id="example-navbar-info">
                            <ul class="flex flex-col lg:flex-row list-none ml-auto justify-center">
                                @if (App\Director::where('user_id', '=', auth()->user()->id)->exists())
                                    <li class="nav-item">
                                        <a href="{{route('director.addAsesor')}}" class="px-2 py-2 my-4 flex items-center text-base uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'director.addAsesor') text-blue-800 underline @else text-blue-600 @endif">
                                            Agregar asesores 
                                        </a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('director.deleteAsesor')}}" class="px-3 py-2 my-4 flex items-center text-base uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'director.deleteAsesor') text-blue-800 underline @else text-blue-600 @endif">
                                            Eliminar Asesores
                                        </a>
                                    </li>
                                @endif
                                @if (App\Asesor::where('user_id', '=', auth()->user()->id)->exists())
                                    <li class="nav-item">
                                        <a href="{{route('asesor.addUsuario')}}" class="px-3 py-2 my-4 flex items-center text-sm uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'asesor.addUsuario') text-blue-800 underline @else text-blue-600 @endif">
                                            Registrar Usuarios
                                        </a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('asesor.asignarTutor')}}" class="px-3 py-2 my-4 flex items-center text-sm uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'asesor.asignarTutor') text-blue-800 underline @else text-blue-600 @endif">
                                            Asignar tutor 
                                        </a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('asesor.groupPract')}}" class="px-3 py-2 my-4 flex items-center text-sm uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'asesor.groupPract') text-blue-800 underline @else text-blue-600 @endif">
                                            Agrupar practicantes
                                        </a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('asesor_views.addActividades')}}" class="px-3 py-2 my-4 flex items-center text-sm uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'asesor_views.addActividades') text-blue-800 underline @else text-blue-600 @endif">
                                            Crear actividades 
                                        </a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('asesor.actividadToCuadernillo.view')}}" class="px-3 py-2 my-4 flex items-center text-sm uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'asesor.actividadToCuadernillo.view') text-blue-800 underline @else text-blue-600 @endif">
                                            Agregar actividades a cuadernillo 
                                        </a> 
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="px-3 py-2 flex items-center text-sm uppercase font-bold leading-snug text-blue-600 hover:opacity-75" href="/asesor/actividadLeccion">
                                            Asignar lecciones a actividades
                                        </a> 
                                    </li> --}}
                                @endif
                                @if (App\Tutor::where('user_id', '=', auth()->user()->id)->exists())
                                    <li class="nav-item">
                                        <a href="{{route('tutor.listarPuntajes')}}" class="px-3 py-2 my-4 flex items-center text-base uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'tutor.listarPuntajes') text-blue-800 underline @else text-blue-600 @endif">
                                            Mostrar avances
                                        </a> 
                                    </li>
                                @endif
                                @if (App\Practicante::where('user_id', '=', auth()->user()->id)->exists())
                                    <li class="nav-item">
                                        <a href="{{route('practicante_views.cuadernillo')}}" class="px-3 py-2 my-4 flex items-center text-base uppercase font-bold leading-snug hover:opacity-75 @if(Route::current()->getName() == 'practicante_views.cuadernillo') text-blue-800 underline @else text-blue-600 @endif">
                                            Navegar en el cuadernillo
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    {{--Nombre del usuario--}}
                                    @if (auth()->check())
                                        <div class="inline">
                                            <form action="{{action('sesionController@logout')}}" method="GET" id="frmLogout" class="my-4">
                                                {{-- <input id="cerrarSesion" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 bg-red-600 rounded-md" type="button" value="Cerrar Sesión"> --}}
                                                <button id="cerrarSesion" type="button" class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-red-600 hover:opacity-50 border border-red-600 bg-while rounded-md w-16">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-16" viewBox="0 0 16 16">
                                                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        @endif
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
            $('.div-hidden').addClass('hidden').removeClass('block');
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
