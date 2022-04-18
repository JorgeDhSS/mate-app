@extends('mainLayout')
<header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Actividad nueva</h1>
            </div>
            </div>

        </div>

    </header>

@section('body')
<form >
    @csrf

<div>
    <div class="min-w-full p-2 text-center">
        <label class="text-gray-900  ">Grupo: </label>
        <select name="selecionaGrupo" id="selecionaGrupo" class="w-1/3 py-2 text-base border-2 ">  
            <option class="bg-white" value="">Grupo</option> 
            @foreach(App\Grupo::get() as $grupo)
                <option class="bg-white" value="{{$grupo->id}}">{{$grupo->nombreGrupo}}</option>     
            @endforeach
        </select>
        <label class="text-gray-900  ">Actividad: </label>
        <select name="seleccionaActividad" id="seleccionaActividad" class="w-1/3 py-2 text-base border-2">
            <option class="bg-white" value="">Título de la actividad</option>
        </select>
    </div>



    <!----<div class="w-wull mt-4" align="right" >
        <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide
        font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
    </div>--->

    <h1 class="text-center">Crear pregunta</h1>
    <hr class="bg-dark border-1 border-top border-dark">



</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $('#selecionaGrupo').on('change', function(){
        var grupoId = $(this).val();
            $.get('/addActividades/ mostrarActividades/'+grupoId, function(res){
                console.log(res);
                var html_select = '<option class="bg-white" value="">Título de la actividad</option>';
                for (var i=0; i<res.length; i++){
                    html_select += '<option class="bg-white" value="'+res[i].id+'">'+res[i].titulo+'</option>';
                }
                $('#seleccionaActividad').html(html_select);
            }); 
    }); 
});
</script>



@endsection