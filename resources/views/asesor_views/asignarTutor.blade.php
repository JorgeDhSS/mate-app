@extends('mainLayout')

@section('body')
<header class="interfaz_Principal">
    <div class="titulo_cata">
    <div class="bg-blue-700">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
            <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Bienvenido a la sección asignar tutor</h1>
        </div>
        </div>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<br>
<div class="px-8">
<<<<<<< HEAD
    <!--DIV DE TUTOR-->
    <div class="flex mb-4">
        <div class="w-1/2 p-2 text-center">
            <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left">
                Ingrese el nombre del Tutor que desea asignar
            </label>    
        </div>
        <div class="w-1/2 p-2 text-center">
                <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="tutor" type="text" name="tutor" required>   
        </div>
        <div class="w-1/2 p-2 text-center">
            <button class="bg-green-400  hover:bg-green-500 text-white font-bold py-4 px-6 rounded-full" type="submit">
                Buscar Tutor
            </button>
        </div>
    </div>
=======
        <div class="flex mb-4">
            <div class="w-1/2 p-2 text-center">
                <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left">
                    Ingrese el nombre del Tutor que desea asignar
                </label>    
            </div>
            <div class="w-1/2 p-2 text-center">
                    <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="tutor" type="text" name="tutor" required>   
            </div>
            <div class="w-1/2 p-2 text-center">
                <button class="bg-green-400  hover:bg-green-500 text-white font-bold py-4 px-6 rounded-full" type="submit" id="searchTutor">
                    Buscar Tutor
                </button>
            </div>
        </div>
        
    <!--DIV DE TUTOR-->
>>>>>>> 715640d5a9cb743d5ace471c3aadf94c92404a5e
    <div>
        <!--style="visibility:hidden;-->
        <div id="tutores">
        
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
                <button id="searchPracticante" class="w-full bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6"> Buscar </button>
            </div>
        </div>
        <div class="flex flex-col w-full md:w-2/3 pt-4 md:pt-0">
            <div class="text-blue-700 px-4 pt-2 font-bold w-full">
                Seleccione el practicante deseado
            </div>
            <div class="flex flex-wrap px-4 pt-2 w-full" id="practicantes">
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
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
                        $('#practicantes').append(response.html);
                    },
                    fail: function(){
                    }
                });
            });
            $('#searchTutor').on('click', function(){
                $.ajax({
                    url: "{{route('asesor.buscarTutor')}}",
                    data: {
                        'name'  : $('#tutor').val(), 
                        "_token": "{{csrf_token()}}"
                    },
                    dataType:"json",
                    method: "POST",
                    success: function(response)
                    {  
                        console.log('hi')
                        console.log(response);
                        $('#tutores').html(response);
                    },
                    fail: function(){
                        console.log('HOLA')
                    }
                });
            });
        });
    </script>
@endsection