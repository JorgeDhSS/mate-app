@extends('mainLayout')

@section('body')
<header class="interfaz_Principal">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<div class="grid grid-cols-2 gap-4 px-8 py-2 md:px-20 md:py-4">  
    <div class="titulo_cata w-full col-span-2">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Bienvenido a la sección asignar tutor</h1>
            </div>
        </div>
    </div>
    
    <div class="w-full col-span-2">
        <form method="POST" action="{{route('asesor.enviarAsignacion')}}">
            @csrf 
            <div class="w-full col-span-2 px-8 flex flex-nowrap">
                <div class="flex flex-wrap w-full w-2/3">
                    <!-- DIV DE TUTOR-->
                    <div class="flex flex-wrap w-full">
                        <div class="flex flex-col w-full md:w-1/3">
                            <div class="text-blue-700 px-4 pt-2 font-bold w-full">
                                Ingrese el nombre del tutor
                            </div>
                            <div class="px-4 w-full">
                                <input type="text" id="nameTutor" class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="tutor">
                            </div>
                            <div class="px-4 pt-4 w-full">
                                <a type="button" id="searchTutor" class="w-full bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6"> Buscar </a>
                            </div>
                        </div>

                        <div class="flex flex-col w-full md:w-2/3 pt-4 md:pt-0">
                            <div class="text-blue-700 px-2 pt-2 font-bold w-full">
                                Seleccione el tutor deseado
                            </div>
                            <div class="flex flex-wrap px-2 pt-2 w-full" id="tutores">
                                    
                            </div>
                        </div>
                    </div>

                    <!--DIV DE PRACTICANTE-->
                    <div class="flex flex-wrap w-full">
                        <div class="flex flex-col w-full md:w-1/3">
                            <div class="text-blue-700 px-4 pt-2 font-bold w-full">
                                Ingrese el nombre del practicante
                            </div>
                            <div class="px-4 w-full">
                                <input type="text" id="namePracticante" class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="practicante">
                            </div>
                            <div class="px-4 pt-4 w-full">
                                <a type="button" id="searchPracticante" class="w-full bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6"> Buscar </a>
                            </div>
                        </div>
                        <div class="flex flex-col w-full md:w-2/3 pt-4 md:pt-0">
                            <div class="text-blue-700 px-2 pt-2 font-bold w-full">
                                Seleccione los practicantes deseados
                            </div>
                            <div class="flex flex-wrap px-2 pt-2 w-full" id="practicantes">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3">
                    <!--DIV DEL BOTON-->
                    <div class="w-full p-2 text-center">
                        <button type="submit" class="bg-green-400  hover:bg-green-500 text-white font-bold py-3 px-2 rounded-full submit">
                            Realizar aignación 
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            @isset($alert)
                {!!$alert!!}
            @endisset
            $('#searchPracticante').on('click', function(){
                $.ajax({
                    url: "{{ route('asesor.buscarPracticante')}}",
                    data: {
                        'name'  : $('#namePracticante').val(),
                        "_token": "{{csrf_token()}}"
                    },
                    dataType:"json",
                    method: "POST",
                    success: function(response)
                    {
                        $('#practicantes').html(response.html);
                    },
                    fail: function(){
                    }
                });
            });
            $('#searchTutor').on('click', function(){
                $.ajax({
                    url: "{{ route('asesor.buscarTutor')}}",
                    data: {
                        'name'  : $('#nameTutor').val(), 
                        "_token": "{{csrf_token()}}"
                    },
                    dataType:"json",
                    method: "POST",
                    success: function(response)
                    {  
                        $('#tutores').html(response.html);
                    },
                    fail: function(){
                    }
                });
            });
        });
    </script>
@endsection