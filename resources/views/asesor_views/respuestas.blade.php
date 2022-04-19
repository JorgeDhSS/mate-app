@extends('mainLayout')
    @section('scripts')


    <script type="text/javascript">

    

/////////////////////////////////////////////////////////////////////////////////////////////

        var btnAgregar = document.getElementById("preguntaN");
        btnAgregar.addEventListener("click", agregar);

        var txtTarea = document.getElementById("PreguntaEscribe");
        var listTareas = document.getElementById("preguntas");
        var txtRespuesta = document.getElementById("respuesta");

        let botonRespuestas = document.createElement("button");

        botonRespuestas.innerHTML = "Agregar respuestas";
        




        function agregar(){
            let tarea = document.createElement("li");
            tarea.textContent = txtTarea.value;
            
            botonRespuestas.className = 'bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer'

            listTareas.appendChild(tarea); 
            listTareas.appendChild(botonRespuestas); 
            botonRespuestas.onclick=RespuestaVentana();
        
        }

        function RespuestaVentana(){
            var edad = prompt('Cuantos años tienes?', '100');
        }
             
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
        
        function  AgregaAct(){

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
                alert("Debes escoger una fecha valida.") 
                return;   
            }
            if(inicio > termina){
                alert("La fecha final no puede ser menor a la de inicio")
                return;
            }


            addActividad.submit();

        }


    </script>
@endsection

@section('body')


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
                    <div class="w-full flex flex-col mt-8">
                        <label class="font-semibold leading-none text-gray-300">Crear una pregunta</label>
                        <input id= "PreguntaEscribe" name="PreguntaEscribe" class="w-full py-2 border-2 mt-4 block rounded-md text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500 " type="text" value="">
                    </div>
                    <div class="w-full flex flex-col mt-8">
                        <div class="row">
                            <div class="col-auto">
                                <ul id="preguntas" class="font-semibold leading-none text-gray-300">
                                    <label for="" id="respuesta" ></label>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full">
                    <input type="button" id="preguntaN" name="preguntaN" value="Pregunta Nueva" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
                    </div>
                </form>
            </div>
        </div>


  
    <div id="preview"></div>
    </div>
</form>

    @endsection

