@extends('mainLayout')
<header class="interfaz_Principal">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script type="text/javascript"></script> 
    </header>
    @section('scripts')


        <script type="text/javascript">

        
///////////////////777//Mostrar la lista de preguntas/////////////////////////////////////////////////////////

            var txtTarea = document.getElementById("PreguntaEscribe");
            var listTareas = document.getElementById("preguntas");   
            var salto = document.createElement("br");



            $(document).ready(function(){
                let listaPreguntas=[];                
                //Añade preguntas y respuestas a un json respuestas
               $('#preguntaN').on('click', function(){

                    let nuevoPregunta = {pregunta : $('#PreguntaEscribe').val()};
                    listaPreguntas.push(nuevoPregunta);

                    var jsonPreguntas= JSON.stringify(listaPreguntas);
                    $("input[name='jsonPreguntas']").val(jsonPreguntas);
                    
                    let preg = document.createElement("li");
                    preg.textContent = txtTarea.value;
                    listTareas.appendChild(preg);
                    


                });
                    

            });
            
////////////////Aceptar solo enteros positivos como valor/////////////////////////////////////////////////////                
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
 //////////////////////Guardar la actividad///////////////////////////////////////////////////////////////////
            function  EnviarDatos(){

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
                if (document.getElementById("descripcionActividad").value == "") {
                alert("Debes describir la actividad.");
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

    <style>
		.animated {
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}

		.animated.faster {
			-webkit-animation-duration: 500ms;
			animation-duration: 500ms;
		}

		.fadeIn {
			-webkit-animation-name: fadeIn;
			animation-name: fadeIn;
		}

		.fadeOut {
			-webkit-animation-name: fadeOut;
			animation-name: fadeOut;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@keyframes fadeOut {
			from {
				opacity: 1;
			}

			to {
				opacity: 0;
			}
		}
	</style>

    @section('body')
        <form action="{{route('respuesta.guardarPregunta')}}" method="post" submit="" id="addActividad" name="addActividad">
            <div class="w-full h-screen px-8 py-2 md:px-20 md:py-4">
                <input type="hidden" name="jsonPreguntas">
                <div class="titulo_cata py-2">
                    <div class="bg-blue-700 md:rounded-lg ">
                        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8 md:rounded-lg">                
                            <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Actividad nueva</h1>
                        </div>
                    </div>

                </div>
                <div class="bg-gradient-to-b from-blue-200 to-blue-200 h-96"></div>
                <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
                    <div class="bg-blue-700 w-full shadow rounded p-8 sm:p-12 -mt-72">
                        <p class="text-3xl font-bold leading-7 text-center text-white">Actividad nueva</p>
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
                        <div>
                            <div class="w-full flex flex-col mt-8">
                                <label class="font-semibold leading-none text-gray-300">Descripción de la actividad </label>
                                <textarea name="descripcionActividad" id="descripcionActividad" class="w-full h-32 border-2 mt-4 block rounded-md text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" style=""></textarea>
                            </div>
                        </div>
                        <div class="w-full flex flex-col mt-8">
                            <div class="row">
                                <ul id="preguntas" class="text-center font-semibold leading-none text-gray-300 col-span-2 md:col-span-1 text-3xl md:text-2xl">
                                    <ul class="text-center font-semibold leading-none text-gray-300 col-span-2 md:col-span-1 text-2xl md:text-2xl" id="respuestas"></ul>
                                </ul>
                            </div>
                        </div>
                        <div class="md:flex items-center mt-12">
                            <div class="flex items-center justify-center w-full ">
                                <input onclick="openModal('another-modal')" class='border-b text-center bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer' value="Agregar pregunta">
                            </div>
                        </div>
                        <div class="w-wull mt-4" align="center">
                            <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()"class='border-b text-center bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer'>
                        </div>
                    </div>
                </div>
            </div>
        @endsection	
            

        <!---------------------------------------------Modal para escribir una pregunta----------------------------------->
            <div class="another-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
                <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
                    <div class="modal-content py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold text-gray-500">Agregar pregunta</p>
                            <div class="modal-close cursor-pointer z-50" onclick="modalClose('another-modal')">
                                <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <!--Body-->
                        <div class="my-5 mr-5 ml-5 flex justify-center">
                            <form  method="POST" id="add_caretaker_form"  class="w-full">
                                <div class="">
                                    <div class="">
                                        <label for="preguntas" class="text-md text-gray-600">Pregunta</label>
                                    </div>
                                    <div class="">
                                        <input type="text" id="PreguntaEscribe" autocomplete="off" name="PreguntaEscribe" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Escribe Aquí">
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="flex justify-end pt-2 space-x-14">
                            <button
                                class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold" onclick="modalClose('another-modal')">Cancelar</button>
                            <button
                                class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" id="preguntaN">Guardar</button>
                            <button
                                class="px-4 bg-red-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400 hover:bg-red-300"  onclick="modalClose('another-modal')">Finalizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    

	<script>
        all_modals = [ 'another-modal']
        all_modals.forEach((modal)=>{
            const modalSelected = document.querySelector('.'+modal);
            modalSelected.classList.remove('fadeIn');
            modalSelected.classList.add('fadeOut');
            modalSelected.style.display = 'none';
        })
        const modalClose = (modal) => {
            const modalToClose = document.querySelector('.'+modal);
            modalToClose.classList.remove('fadeIn');
            modalToClose.classList.add('fadeOut');
            setTimeout(() => {
                modalToClose.style.display = 'none';
            }, 500);
        }

        const openModal = (modal) => {
            const modalToOpen = document.querySelector('.'+modal);
            modalToOpen.classList.remove('fadeOut');
            modalToOpen.classList.add('fadeIn');
            modalToOpen.style.display = 'flex';
        }
    
	</script>

