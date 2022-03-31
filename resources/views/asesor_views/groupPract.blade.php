@extends('mainLayout')
    <title>Agrupar practicantes</title>
 
@section('body')
    <!--//Div para el titulo-->
    <div class="w-full bg-blue-700 h-24">
        <h1 class="ml-4 col-span-2 text-3xl text-white pl-auto">Agrupar practicante</h1>
    </div>
    <div class="w-full">
        <form action="">
            <div class="w-1/2 my-4 ml-4">
                <label class="block mb-2 ml-4" for="">Nombre del grupo: </label>
                <input class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-2/3" name="btnNamegroup" id="btnNamegroup" type="text">
            </div>
            <div>
                <div class="w-1/2 my-4 ml-4">
                    <label class="mb-2 ml-4" for="">Buscar practicante: </label>
                    <input class="px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-2/5" name="btnSearchPract" id="btnSearchPract" type="text">
                    <div class="my-2 ml-4" id="table">
                        <table class="table-auto">
                            <thead class="bg-gray-100">
                                <th class="border-2 px-4 py-2">Nombre</th>
                                <th class="border-2 px-4 py-2">Matrícula</th>
                                <th class="border-2 px-4 py-2">Nivel escolar</th>
                                <th class="border-2 px-4 py-2">Acción</th>
                            </thead>
                            <tbody>
                                @foreach($resultados as $resultado)
                                    <tr>
                                        <td class="text-center border-2 px-4 py-2">{{ $resultado->name }}</td>
                                        <td class="text-center border-2 px-4 py-2">{{ $resultado->matricula }}</td>
                                        <td class="text-center border-2 px-4 py-2">{{ $resultado->nivelEscolar }}</td>
                                        <td class="text-center border-2 px-4 py-2"><input type="checkbox" value="{{ $resultado->id }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--//Para mostrar tabla de seleccion-->
            <div>

            </div>
            <!--//Boton-->
            <div>

            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection