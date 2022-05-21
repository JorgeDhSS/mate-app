@extends('mainLayout')

<title>Generar reporte PDF</title>
@section('body')
    <header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 ">Aquí podras generar el reporte de tus tutorados</h1>
            </div>
            </div>
        </div>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </header>


    <!--BOTONES-->
    <div class="flex mb-4">
        <div class="w-4/6 p-2  text-center"></div>
        <div class="w-2/6 p-2  text-center">
            <div class="flex mb-4">
                <div class="w-1/2 p-2  text-center">
                    <a href="{{route('tutor.generarReporte')}}" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-6 border-b-4 border-green-700 hover:border-green-500 rounded">
                    Imprimir
                    </a>
                </div>
                <div class="w-1/2 p-2 text-center">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Enviar por email
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--MOSTRAR PRACTICANTES-->
    @isset($respuestas)
    @foreach($respuestas as $r)
        <div class="w-full rounded overflow-hidden shadow-lg">
            <div class="w-full p-2 bg-gray-400 text-center"><div class="font-bold text-xl mb-2 text-center">{{$r->user->name}}</div></div>
            <div class="flex mb-4">
                <div class="w-1/2 p-2 bg-gray-400 text-center">
                    <div class="px-6 py-4">
                        <p class="">
                            <label >Matricula: </label>{{$r->matricula}}
                            <br>
                            <br>
                            <label >Nivel Escolar: </label>{{$r->nivelEscolar}}
                        </p>
                    </div>
                </div>
                <div class="w-1/2 p-2 bg-gray-500 text-center">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 text-center"></div>
                            <div class="flex mb-4">
                                <div class="w-1/2 p-2 bg-gray-400 text-center">
                                    <p class="">
                                        <label class="text-center">Aciertos</label>
                                        <br>
                                        <input class="border border-green-500 text-center h-20 w-20" type="text" value="{{$r->correctas}}">
                                    </p>
                                </div>
                                <div class="w-1/2 p-2 bg-gray-500 text-center">
                                    <p class="">
                                        <label class="text-center">Total de puntos</label>
                                        <br>
                                        <input class="border border-green-500 text-center h-20 w-20" type="text" value="{{$r->total}}">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    @endforeach
    @endisset
@endsection