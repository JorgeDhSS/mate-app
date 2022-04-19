@extends('mainLayout')
<!--<header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                 <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Actividad nueva</h1>
            </div>
            </div>

        </div>

    </header> -->

    @section('scripts')
    <!--<script type="text/javascript">
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
    </script>-->

    <script type="text/javascript">

   

        function Numeros(string){//Solo numeros
            var out = '';
            var filtro = '1234567890';//Caracteres validos
            
            //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
            for (var i=0; i<string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1) 
                    //Se añaden a la salida los caracteres validos
                out += string.charAt(i);
            
            //Retornar valor filtrado
            return out;
        }  

        function nuevaPregunta(){

            var hoy = new Date();
            var inicio = document.getElementById("fechaInicio").value
            var termina = document.getElementById("fechaTermina").value
            var mes = (hoy.getMonth()+1).toString();
            var dia = hoy.getDate().toString();          

            if(mes.length <= 1){
                mes = "0" + mes;
            }
            if(dia.length <=1){
                dia = "0" + dia;
            }

            var fecha = hoy.getFullYear() + "-" + mes + "-" + dia; 

       

            if (document.getElementById("valorActividad").value == "") {
                alert("Debes asignar un valor a la actividad.");
                return;
            }
            if (document.getElementById("selecionaGrupo").value == "") {
                alert("Debes seleccionar un grupo.");
                return;
            }
            
            if(document.getElementById("nombreActividad").value == "") {
                alert("Debes asignar un nombre a la actividad.");
                return;
            }
            if(inicio == "") {
                alert("Debes asignar la fecha para iniciar la actividad.");
                return;
            }
            if(termina == "") {
                alert("Debes asignar la fecha en la que finaliza la actividad.");
                return;
                
            }
            if( fecha > inicio){
                alert("Debes escoger una fecha valida.");
                return;   
            }
            if(inicio > termina){
                alert("La fecha final no puede ser menor a la de inicio");
                return;
            }


            addActividad.submit();
        }
    </script>
@endsection

@section('body')

<!--<form >
    @csrf

<!-<form >
    

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
    </div>-->



    <div class="w-wull mt-4" align="right" >
        <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide
        font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
    </div> 

    <!----<div class="w-wull mt-4" align="right" >
        <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide
        font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
    </div>

    <h1 class="text-center">Crear pregunta</h1>
    <hr class="bg-dark border-1 border-top border-dark"> --->
    <!---<h1 class="text-center">Crear pregunta</h1>
    <hr class="bg-dark border-1 border-top border-dark">



</div>
</form>--->




    
            
           <!-- <div class="w-wull mt-4" align="right" >
                <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide
                            font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
            </div>
            !<div class="w-wull mt-4" align="right" >
                <input type="button" id="NuevaPregunta" name="NuevaPregunta" value="NuevaPregunta" onclick="ActivaPreguntas()" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide
                            font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
            </div>-->
            <!--
            <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                <label class="text-gray-900 ">Escribe una pregunta</label>
                <input type="" class="w-full py-2 border-2 mt-4 block rounded-md text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" name="nombreActividad" id="nombreActividad">
            </div>-->

            
                
       <!-- </div>
</form> -->
 

@csrf

<form action="{{route('respuesta.guardarPregunta')}}" method="post" submit="" id="addActividad" name="addActividad">
    <div class="w-full bg-blue-200 h-screen">
        <div class="bg-gradient-to-b from-blue-200 to-blue-200 h-96"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-blue-700 w-full shadow rounded p-8 sm:p-12 -mt-72">
                <p class="text-3xl font-bold leading-7 text-center text-white">Actividad nueva</p>
                <form action="{{route('asesor_views.respuestas')}}" method="post" submit="" id="addActividad" name="addActividad">
                @csrf
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Inicia</label>
                            <input type="date" name="fechaInicio" id="fechaInicio" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" />
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none text-gray-300">Termina</label>
                            <input type="date" name="fechaTermina" id="fechaTermina" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500"/>
                        </div> 
                    </div>

                    <div class="md:flex items-center mt-12">
                        <div class="w-full flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">grupo: </label>
                            <select name="selecionaGrupo" id="selecionaGrupo" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">  
                                <option class="bg-white" value="">Grupo</option> 
                                @foreach(App\Grupo::get() as $grupo)
                                    <option class="bg-white" value="{{$grupo->id}}">{{$grupo->nombreGrupo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none text-gray-300">Valor: </label>
                            <input type="" onkeyup="this.value=Numeros(this.value)" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="valorActividad" name="valorActividad">
                        </div>

                        
                    </div>
                    <div>
                        <div class="w-full flex flex-col mt-8">
                            <label class="font-semibold leading-none text-gray-300">Nombre de la actividad</label>
                            <input type="" class="w-full py-2 border-2 mt-4 block rounded-md text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" name="nombreActividad" id="nombreActividad">
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label class="font-semibold leading-none text-gray-300">Pregunta nueva</label>
                        <input id= "PreguntaEscribe" name="PreguntaEscribe" class="w-full py-2 border-2 mt-4 block rounded-md text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500 " type="text" value="">
                        <!--<label class="pregunta">Pregunta nueva</label>-->
                    </div>
                    <div class="flex items-center justify-center w-full">
                    <input type="button" id="preguntaN" name="preguntaN" value="Pregunta Nueva" onclick="nuevaPregunta()" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>

@endsection

