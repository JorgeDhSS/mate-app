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
                <button class="bg-green-400  hover:bg-green-500 text-white font-bold py-4 px-6 rounded-full" id="searchTutor">
                    Buscar Tutor
                </button>
            </div>
        </div>
        
    <!--DIV DE TUTOR-->
    <div >
        <!-- <table class="table col-12">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>CURP</td>
                <td>Numero de telefono</td>
            </tr>
        </thead>
        <tbody>
            <tr> 
               <div id="tutores"></div>
            </tr>
        </tbody>
</table> -->


    <table class="table-auto" border="1">
    <thead>
        <tr>
        <th class="px-4 py-2">Nombre</th>
        <th class="px-4 py-2">CURP</th>
        <th class="px-4 py-2">Numero de telefono</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <div id="tutores">
            </div>
        </tr>
    </tbody>
    </table>


    </div>


    <!--DIV DE PRACTICANTE-->
    <div>


























    </div>
    

</div>


@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
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