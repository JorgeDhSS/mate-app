@extends('mainLayout')
 
@section('body')
<header class="interfaz_Principal">
    <div class="titulo_cata">
    <div class="bg-blue-700">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
            <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 ">Aquí podras eliminar un asesor</h1>
        </div>
        </div>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>


<br>
<div class="px-8">
    <div class="flex flex-wrap w-full">
        <div class="flex flex-col w-full md:w-1/3">
            <div class="text-blue-700 px-4 pt-2 font-bold w-full">
                Ingrese el nombre del asesor que desea eliminar 
            </div>
            <div class="px-4 w-full">
                <input type="text" id="nameAsesor" class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="asesor">
            </div>
            <div class="px-4 pt-4 w-full">
                <button id="searchAsesor" class="w-full bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6"> Buscar </button>
            </div>
        </div>
        <div class="flex flex-col w-full md:w-2/3 pt-4 md:pt-0">
            <div class="text-blue-700 px-4 pt-2 font-bold w-full">
                Seleccione el asesor que desea eliminar 
            </div>
            <div class="flex flex-wrap px-4 pt-2 w-full" id="asesores">
                
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#searchAsesor').on('click', function(){
                $.ajax({
                    url: "{{ route('director.buscarAsesor')}}",
                    data: {
                        'name'  : $('#nameAsesor').val(),
                        "_token": "{{csrf_token()}}"
                    },
                    dataType:"json",
                    method: "POST",
                    success: function(response)
                    {
                        $('#asesores').html(response.html);
                    },
                    fail: function(){
                    }
                });
            }); 
        });
    </script>
@endsection