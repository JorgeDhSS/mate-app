@extends('mainLayout')
@section('body')
<header class="interfaz_Principal">
    <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Tus cuadernillos disponibles</h1>
            </div>
        </div>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>
@csrf

@foreach(App\Cuadernillo::get() as $cuadernillo)
<!--<div class="container m-auto px-12 space-y-56 text-gray-500 md:px-56">
    <a href="">
        <div class="w-full max-w-sm md:w-1/3 p-3 mb-6 md:mb-0">
            <div class="rounded overflow-hidden shadow-lg">
                <div class="titulo_cata">
                    <div class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500">
                        <div class="px-6 py-4 ">
                            <div class="font-bold text-xl mb-2 ">{{$cuadernillo->nombre}}</div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <div class="flex flex-wrap -mx-3 mb-6 text-black">
                        {{$cuadernillo->tema}}
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <a class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{route('practicante_views.actividadesMostrar', $cuadernillo->id)}}">Ver actividades

                        </a>
                    </div>
                </div>

            </div>
        </div>

    </a>

</div>-->



<!--<div class="bg-gradient-to-b from-blue-100 to-blue-100">-->
<br>
<br>
<div class="container m-auto px-12 space-y-56 text-green-400 md:px-64">
    <a href="#" class="flex flex-col items-center bg-green rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-green-200 dark:border-red-700 dark:bg-green-800 dark:hover:bg-green-700">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-green">{{$cuadernillo->nombre}}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{$cuadernillo->tema}}</p>

            <div id="botones">
                <input type="button" onclick="javascript:cambia_de_pagina();" value="Ver activiades" name="btnActividades" id="btnActividades" class="pl-auto bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6" />
            </div>
        </div>
    </a>
</div>
<!--</div>-->
@endforeach
@endsection

@section('scripts')
<script>
        function cambia_de_pagina() {

        location.href = "{{route('practicante_views.actividadesMostrar', $cuadernillo->id)}}"
        }
            
        
       
    </script>





@endsection