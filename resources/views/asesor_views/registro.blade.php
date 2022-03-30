@extends('mainLayout')

@section('body')
        <center>
          <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                      ¿A que tipo de usuario  deseas registrar?  
          </div><br>
        </center>

        <!-- CUSTOM SELECT -->
        <div class="inline-block relative w-full">
            <select name="opciones" class="block appearance-none w-full bg-white border border-green-700 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline, opciones">
                <option value="blanco" >Elige una opción</option>
                <option value="practicante" >Practicante</option>
                <option value="tutor" >Tutor</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div><br><br>

        <div>
          <!--FORMULARIO DEL TUTOR-->
        <div class="registro1" id="registro1" style="visibility:hidden;" >
           <form id="registroT" name="registroT" class="w-full max-w-full" method="POST" action="{{route('tutor.enviarTutor')}}">
            @csrf
              <!-- SECCION 1 -->
              <div class="flex mb-4">
                <div class="w-1/2 p-2 text-center">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                            Nombre Completo 
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombreT" type="text" name="nombreT">
                        </div>
                    </div>
                </div>
                <div class="w-1/2 p-2 text-center">
                <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                          Correo Electronico
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="emailT">
                      </div>
                    </div>
                </div>
              </div>


              <!-- SECCION 2 -->
              <div class="flex mb-4">
                <div class="w-1/2 p-2 text-center">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="curp">
                            CURP
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="curp" type="text" name="curpT" >
                        </div>
                    </div>
                </div>
                <div class="w-1/2 p-2 text-center">
                <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="domicilio">
                          Domicilio
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="domicilio" type="text" name="domicilioT">
                      </div>
                    </div>
                </div>
              </div>

              <!-- SECCION 3 -->
              <div class="flex mb-4">
                <div class="w-1/2 p-2 text-center">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="numT">
                            Numero de telefono 
                          </label>
                          <p class="text-gray-600 text-xs italic">Este puede ser personal o de casa</p>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="numT" type="text" name="numeroT">
                        </div>
                    </div>
                </div>
                <div class="w-1/2 p-2 text-center">
                <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                          Contraseña 
                        </label>
                        <p class="text-gray-600 text-xs italic">Esta debe ser creada por el asesor</p>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="passwordT" name="passwordT" type="password" placeholder="************">
                      </div>
                    </div>
                </div>
              </div>

                <!-- BOTON -->
                <div class="w-full p-2 text-center">
                    <button type="submit" class="bg-green-400  hover:bg-green-500 text-white font-bold py-4 px-6 rounded-full">
                          Registrar Tutor
                    </button>  
                </div>
           </form>   
        </div>

        <!--FORMULARO DEL PRACTICANTE-->
        <div class="registro2" id="registro2" style="visibility:hidden;" >
          <form id="registroP" name="registroP" method="POST" action="{{route('practicante.enviarPracticante')}}" class="w-full max-w-full">
          @csrf
              <!-- SECCION 1 -->
              <div class="flex mb-4">
                <div class="w-1/2 p-2 text-center">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombreP">
                            Nombre Completo 
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombreP" type="text" name="nombreP">
                        </div>
                    </div>
                </div>
                <div class="w-1/2 p-2 text-center">
                <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="emailP">
                          Correo Electronico
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="emailP" type="email" name="emailP">
                      </div>
                    </div>
                </div>
              </div>


              <!-- SECCION 2 -->
              <div class="flex mb-4">
                <div class="w-1/2 p-2  text-center">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="matriculaP">
                            Matricula 
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="matriculaP" type="text" name="matricula">
                        </div>
                    </div>
                </div>
                <div class="w-1/2 p-2 text-center">
                <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nivelP">
                          Contraseña 
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="passwordP" type="text" name="passwordP">
                      </div>
                    </div>
                </div>
              </div>

              <!-- SECCION 3 -->
              <div class="flex mb-4">
                <div class="w-1/3 p-2 text-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="materiasP">
                          Nivel Escolar 
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nivelEsc" type="text" name="nivelEsc">   
                </div>

                <div class="w-1/3 p-2 text-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="horasP">
                          Horas Semanales
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="horasSem" type="text" name="horasSem">   
                </div>

                <div class="w-1/3 p-2 text-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="caliP">
                          Calificación
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="calificacion" type="text" name="calificacion">   
                </div>

                <div class="w-1/3 p-2 text-center">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="materiasP">
                          Numero de materias
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="noMaterias" type="text" name="numMaterias">   
                </div>
              </div>



              <!-- BOTON -->
              <div class="w-full p-2 text-center">
                <button class="bg-green-400  hover:bg-green-500 text-white font-bold py-4 px-6 rounded-full" type="submit">
                    Registrar Practicante
                </button> 
              </div>
            </form>       
        </div>

        </div>
        
@endsection


@section('scripts')
    <script type="text/javascript">
        const selectElement = document.querySelector('.opciones');

        selectElement.addEventListener('change', (event) => {
          if(event.target.value == "blanco"){
            document.getElementById('registro1').style.visibility = 'hidden';
            document.getElementById('registro2').style.visibility = 'hidden';
          }

          if(event.target.value == "tutor"){
              document.getElementById('registro2').remove();
              document.getElementById('registro1').style.visibility = 'visible';
          } else if(event.target.value == "practicante"){
              document.getElementById('registro1').remove();
              document.getElementById('registro2').style.visibility = 'visible';
        }  
        });
    </script>
@endsection