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
                    <a class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Enviar por email
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--MOSTRAR PRACTICANTES-->
    @foreach($respuestas as $r)
        <div class="p-8 m-8 rounded overflow-hidden shadow-2xl border-8 border-8 border-8 lg:border-l-0 lg:border-t lg:border-black bg-blue-300 border-8">
            <div class="w-full p-2 text-center"><div class="text-3xl font-black font-serif text-lg text-gray-800 text-center">{{$r->user->name}}</div></div>
            <div class="flex mb-4">
                <div class="w-1/2 p-2 text-center">
                    <div class="px-6 py-4">
                        <p class="">
                            <label class="text-3xl font-black " >Matricula: </label> <label class="font-medium text-2xl">{{$r->matricula}}</label>
                            <br>
                            <br>
                            <label class="text-3xl font-black" >Nivel Escolar: </label><label class="font-medium text-2xl">{{$r->nivelEscolar}}</label>
                        </p>
                    </div>
                </div>
                <div class="w-1/2 p-2 text-center">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 text-center"></div>
                            <div class="flex mb-4">
                                <div class="w-1/2 p-2 text-center">
                                    <p class="">
                                        <label class="text-center font-black text-3xl text-green-500">Aciertos</label>
                                        <br>
                                        <input class="border border-green-500 text-center h-20 w-20" type="text" value="{{$r->correctas}}">
                                    </p>
                                </div>
                                <div class="w-1/2 p-2 text-center">
                                    <p class="">
                                        <label class="text-center font-black text-3xl text-red-500">Errores</label>
                                        <br>
                                        <?php 
                                            $errores = $r->total - $r->correctas
                                        ?>
                                        <input class="border border-4 border-red-500  text-center h-20 w-20" type="text" value="{{$errores}}">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    @endforeach

@endsection