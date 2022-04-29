@extends('mainLayout')
           
    @section('body')
    <!-- component -->
    <header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8 ">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 justify-center"> Agregar respuestas</h1>
            </div>
            </div>

        </div>

    <div class="bg-blue-200 opacity-60 inset-0 z-0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-red-200">
                        <form action="{{route('respuesta.guardarRespuesta')}}" method="post" submit="" id="addRespuestas" name="addRespuestas">    
                            @csrf
                            <div class="mb-4">
                                <input type="hidden" name="jsonRespuestas">
                                <label class="text-xl text-gray-600">Grupo: <span class="text-red-500">*</span></label></br>
                                    <select name="selecionaGrupo" id="selecionaGrupo" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">  
                                        <option class="bg-white" value="">Grupo</option> 
                                        @foreach(App\Grupo::get() as $grupo)
                                            <option class="bg-white" value="{{$grupo->id}}">{{$grupo->nombreGrupo}}</option>
                                        @endforeach
                                    </select>
                                
                            </div>

                            <div class="mb-4">
                                <label class="text-xl text-gray-600">Actividad:<span class="text-red-500">*</span></label></br>
                                <select name="SeleccionaActividad" id="SeleccionaActividad" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500"></select>
                            </div>
                            <div class="mb-4">
                                <label class="text-xl text-gray-600">Pregunta: <span class="text-red-500">*</span></label></br>
                                <select name="SeleccionaPregunta" id="SeleccionaPregunta" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500"></select>
                                
                            </div>

                            <div class="mb-8">
                                <label for="respuesta">Escribe aquí tu respuesta: <span class="text-red-500">*</span></label></br>
                                
                                <textarea type="text" name="respuestaEscribe" id="respuestaEscribe" class="border-2 border-gray-500">
                                    
                                </textarea>
                            </div>

                            <div class="flex p-1">
                                    <select class="border-2 border-gray-300 border-r p-2" name="valorRespuesta" id="valorRespuesta">
                                        <option value="">Escoge el valor de la respuesta</option>
                                        <option value="1">Respuesta correcta</option>
                                        <option value="0">Respuesta incorrecta</option>
                                    </select>       
                            </div>
                           
                            <input class='border-b text-center bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer' id="addRespuesta" name="addRespuesta" value="Añadir respuesta">
                                <div class="row">
                                    <ul id="respuestas" class="text-center font-semibold leading-none text-gray-300 col-span-2 md:col-span-1 text-3xl md:text-2xl">
                                        <ul class="text-center font-semibold leading-none text-gray-300 col-span-2 md:col-span-1 text-2xl md:text-2xl" id="respuestas"></ul>
                                    </ul>
                                </div>

                                <div class="mb-4">
                                <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()"class='border-b text-center bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer'>
                                </div>

                                
                           

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>


    


    <!--
        <form action="{{route('respuesta.guardarRespuesta')}}" method="post" submit="" id="addRespuestas" name="addRespuestas">
            <div class="w-full bg-blue-200 h-screen">
                @csrf
                <input type="hidden" name="jsonRespuestas">
                <label class="font-semibold leading-none text-gray-300">Grupo: </label>
                <select name="selecionaGrupo" id="selecionaGrupo" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">  
                    <option class="bg-white" value="">Grupo</option> 
                    @foreach(App\Grupo::get() as $grupo)
                        <option class="bg-white" value="{{$grupo->id}}">{{$grupo->nombreGrupo}}</option>
                    @endforeach
                </select>
                <label class="font-semibold leading-none text-gray-300">Actividad: </label>
                <select name="SeleccionaActividad" id="SeleccionaActividad" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">
                    
                </select>
                <label class="font-semibold leading-none text-gray-300">Pregunta: </label>
                <select name="SeleccionaPregunta" id="SeleccionaPregunta" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">
                    
                </select>
                <label for="respuesta">Escribe aquí tu respuesta</label>
                <input type="text" name="respuestaEscribe" id="respuestaEscribe" class="w-full py-2 border-2 mt-4 block rounded-md text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" >
                <select name="valorRespuesta" id="valorRespuesta">
                    <option value="">Escoge el valor de la respuesta</option>
                    <option value="1">Respuesta correcta</option>
                    <option value="0">Respuesta incorrecta</option>
                </select>
                <input type="button" id="addRespuesta" name="addRespuesta" value="Añadir respuesta">
                <div class="row">
                    <ul id="respuestas" class="text-center font-semibold leading-none text-gray-300 col-span-2 md:col-span-1 text-3xl md:text-2xl">
                        <ul class="text-center font-semibold leading-none text-gray-300 col-span-2 md:col-span-1 text-2xl md:text-2xl" id="respuestas"></ul>
                    </ul>
                </div>
                <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()"class='border-b text-center bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer'>

        </form>
    -->
    @endsection	
    @section('scripts')

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'respuestaEscribe' );
    </script>


        <script type="text/javascript">
        $(document).ready(function(){
            $('#selecionaGrupo').on('change', function(){
                var grupoId = $(this).val();
                    $.get('/addActividades/mostrarActividades/'+grupoId, function(res){
                        console.log(res);
                        var html_select = '<option class="bg-white" value="">Título de la actividad</option>';
                        for (var i=0; i<res.length; i++){
                            html_select += 
                                '<option class="bg-white" value="'+res[i].id+'">'+res[i].titulo+'</option>'
                        }
                        $('#SeleccionaActividad').html(html_select);
                    }); 
            });

            $('#SeleccionaActividad').on('change', function(){
                var actividadId = $(this).val();
                    $.get('/addActividades/mostrarPreguntas/'+actividadId, function(res){
                        console.log(res);
                        var html_select = '<option class="bg-white" value="">Pregunta</option>';
                        for (var i=0; i<res.length; i++){
                            html_select += 
                                '<option class="bg-white" value="'+res[i].id+'">'+res[i].pregunta+'</option>'
                        }
                        $('#SeleccionaPregunta').html(html_select);
                    }); 
            });

            var txtRespuesta = document.getElementById("respuestaEscribe");
            var listTareas = document.getElementById("respuestas");

            $(document).ready(function(){
                let listaRespuesta=[];                
                //Añade preguntas y respuestas a un json respuestas
               $('#addRespuesta').on('click', function(){
                        
                    var listTareas = document.getElementById("respuestas");

                    var valorRespuesta = document.getElementById("valorRespuesta").value;

                    if (document.getElementById("respuestaEscribe").value == "") {
                        alert("Debes escribir una respuesta.");
                        return;
                    }
                    if (document.getElementById("valorRespuesta").value == "") {
                        alert("Debes escribir especificar si la espuesta es correcta o incorrecta.");
                        return;
                    }

                    let nuevoPregunta = {respuesta : $('#respuestaEscribe').val(), valorRes : valorRespuesta };
                    listaRespuesta.push(nuevoPregunta);

                    var jsonRespuestas= JSON.stringify(listaRespuesta);
                    $("input[name='jsonRespuestas']").val(jsonRespuestas);
                    
                    let resp = document.createElement("li");
                    resp.textContent = txtRespuesta.value;
                    listTareas.appendChild(resp);
                });
            });
        });
        
        function  EnviarDatos(){

            if (document.getElementById("selecionaGrupo").value == "") {
                alert("Debes seleccionar un grupo.");
                return;
            }
            if (document.getElementById("SeleccionaActividad").value == "") {
                alert("Debes seleccionar una actividad.");
                return;
            }
            if (document.getElementById("SeleccionaPregunta").value == "") {
                alert("Debes seleccionar una pregunta.");
                return;
            }
            addRespuestas.submit();

        }

        </script>
    @endsection
            

        
