@extends('mainLayout')
 
@section('body')
    <!--//Div para el titulo-->
    <div class="w-full text-3xl md:text-4xl bg-blue-700 h-24">
        <h1 class="text-3xl text-white pl-auto">Agrupar practicante</h1>
    </div>
    <div class="w-full">
        <form action="">
            <div class="w-1/2 my-4">
                <label class="block mb-2 ml-4" for="">Nombre del grupo: </label>
                <input class="border-4 ml-4" name="btnNamegroup" id="btnNamegroup" type="text">
            </div>
            <div>
                <div class="my-4">
                    <label class="block mb-2 ml-4" for="">Buscar practicante: </label>
                    <input class="border-4 ml-4" name="btnSearchPract" id="btnSearchPract" type="text">
                </div>
                <div class="my-4">

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
        function buscarNombreUso(){
            var nombreGrupo = document.getElementById("btnNamegroup").value;
        }
        
    </script>
@endsection