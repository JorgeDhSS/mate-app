@extends('mainLayout')

<title>Resgistro Tutor o Practicante</title>
@section('body')

    <header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Bienvenido al registro de un nuevo tutor o practicante</h1>
            </div>
            </div>
        </div>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </header>
        
        <!-- INPUTS PRINCIPALES-->
        @error('email')
        <div class="error">
          <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
              ¡Advertencia!
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
              <p>El email que intenta ingresar ya fue registrado anteriormente</p>
            </div>
          </div>
        </div>
        @enderror
        <br>
        <div class="px-8">
          <form  id="registro" name="registro" class="w-full max-w-full" method="POST" action="{{route('asesor.enviarUsuario')}}">
            @csrf
              <div class="flex mb-4">
                    <div class="w-2/3 p-2 text-center">
                        <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="materiasP">
                              Nombre
                        </label>
                        <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="nombre" type="text" name="nombre" required>   
                    </div>

                    <div class="w-2/3 p-2 text-center">
                        <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="horasP">
                              Email
                        </label>
                        <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="email" type="email" name="email" required>   
                    </div>
              </div>

              <div class="flex mb-4">
                    <div class="w-2/3 p-2 text-center">
                        <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="materiasP">
                              Password
                        </label>
                        <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="password" type="password" name="password" required>   
                    </div>

                    <div class="w-2/3 p-2 text-center">
                      <div class="inline-block relative w-full">
                          <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="materiasP">
                              ¿Que tipo de usuario deseas registrar?
                          </label>
                          <select name="opciones" class="block appearance-none w-full bg-white border border-green-700 hover:border-gray-500 px-4 py-3 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline, opciones">
                              <option value="blanco" >Elige una opción</option>
                              <option value="practicante" >Practicante</option>
                              <option value="tutor" >Tutor</option>
                          </select>
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                          </div>
                      </div>
                    </div>
              </div>
            <div>
              <!--FORMULARIO DEL TUTOR-->
            <div class="registro1" id="registro1" style="visibility:hidden;" >
                @csrf
                  <div class="flex mb-4">
                    <div class="w-1/2 p-2 text-center">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                              <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="curp">
                                CURP
                              </label>
                              <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="curp" type="text" name="curpT" required>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 p-2 text-center">
                    <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="domicilio">
                              Domicilio
                            </label>
                            <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="domicilio" type="text" name="domicilioT" required>
                          </div>
                        </div>
                    </div>
                  </div>

                  <div class="flex mb-4">
                    <div class="w-1/2 p-2 text-center">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                              <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="numT">
                                Numero de telefono 
                              </label>
                              <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="numT" type="text" name="numeroT" required>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 p-2 text-center">
                        <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full p-2 text-center">
                              <button type="submit" class="bg-green-400  hover:bg-green-500 text-white font-bold py-6 px-8 rounded-full">
                                    Registrar Tutor
                              </button>
                              <input  value="true" id="buttonT" type="hidden" name="buttonT" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">  
                          </div>  
                        </div>
                    </div>
                  </div>
            </div>

            <!--FORMULARO DEL PRACTICANTE-->
            <div class="registro2" id="registro2" style="visibility:hidden;" >
              @csrf
                  <div class="flex mb-4">
                    <div class="w-1/2 p-2  text-center">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                              <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="matriculaP">
                                Matricula 
                              </label>
                              <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="matriculaP" type="text" name="matricula" required>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 p-2 text-center">
                    <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full px-3">
                              <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="materiasP">
                                  Nivel Escolar 
                              </label>
                              <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="nivelEsc" type="text" name="nivelEsc" required>   
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="flex mb-4">
                    <div class="w-2/3 p-2 text-center">
                        <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="horasP">
                              Horas Semanales
                        </label>
                        <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="horasSem" type="text" name="horasSem" required>   
                    </div>

                    <div class="w-2/3 p-2 text-center">
                        <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="caliP">
                              Calificación
                        </label>
                        <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="calificacion" type="text" name="calificacion" required>   
                    </div>

                    <div class="w-2/3 p-2 text-center">
                        <label class="block uppercase tracking-wide text-blue-700 font-bold mb-2 text-left" for="materiasP">
                              Numero de materias
                        </label>
                        <input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" id="noMaterias" type="text" name="numMaterias" required>   
                    </div>
                  </div>
                <div class="w-full p-2 text-center">
                  <button class="bg-green-400  hover:bg-green-500 text-white font-bold py-4 px-6 rounded-full" type="submit">
                      Registrar Practicante
                  </button> 
                </div>
            </div>
            </div>
          </form>
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