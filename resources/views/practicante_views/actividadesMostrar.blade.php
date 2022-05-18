@extends('mainLayout')
@section('body')

<header class="interfaz_Principal">
    <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Actividades dentro de tu cuadernillo</h1>
            </div>
        </div>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<!--@csrf
@foreach($actividades as $actividad) 
    <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">
        <div class="w-full max-w-sm md:w-1/3 p-3 mb-6 md:mb-0">
            <div class="rounded overflow-hidden shadow-lg">
                <div class="titulo_cata">
                    <div class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500">
                        <div class="px-6 py-4 ">
                            <div class="font-bold text-xl mb-2 ">{{$actividad->titulo}}</div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <div class="flex flex-wrap -mx-3 mb-6 text-black">
                        {{$actividad->fechaInicio}}
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <div class="flex flex-wrap -mx-3 mb-6 text-black">
                            {{$actividad->fechaCierre}}
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            

                    </div>
                </div> 
                   
            </div>
        </div>
    </div>
    @endforeach-->

@csrf
@foreach($actividades as $actividad)
<!--<div class="bg-gradient-to-b from-green-100 to-green-200">-->
    <br>
    <br>
    <div class="container m-auto px-12 space-y-56 text-gray-500 md:px-64">
    <a href="#" class="flex flex-col items-center bg-green rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-green-200 dark:border-red-700 dark:bg-green-800 dark:hover:bg-green-700">

            <div class="flex flex-col justify-between p-4 leading-normal">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white ">{{$actividad->titulo}}</h5>

                </div>

                <div date-rangepicker class="flex items-center">
                    <span class="mx-4 text-gray-500">Inicia: </span>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$actividad->fechaInicio}}</p>
                    </div>
                    <span class="mx-4 text-gray-500">Termina: </span>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$actividad->fechaCierre}}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <br>


<!--</div>-->

@endforeach

@endsection