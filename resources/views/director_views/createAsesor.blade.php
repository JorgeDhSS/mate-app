@extends('mainLayout')
 
@section('body')
    <div class="grid grid-cols-2 gap-4 px-8 py-2 md:px-20 md:py-10">
        <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
            Datos del asesor 
        </div>
        <div class="col-span-2 md:col-span-1">
            <div class="flex bg-green-500 rounded-lg p-4 mb-4 text-sm text-white" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
                </div>
            </div>
        </div>
        <div class="col-span-2 md:col-span-1">
            <label for="">Nombre</label>
            <input class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" type="text" name="name" id="name">
        </div>
        <div class="col-span-2 md:col-span-1">
            <label for="">Correo</label>
            <input class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" type="email" name="mail" id="mail">
        </div>
        <div class="col-span-2 md:col-span-1">
            <button id="passwordGenerate" class="bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6">Generar contraseña</button>
        </div>
        <div class="col-span-2 md:col-span-1">
            <label for="">Contraseña</label>
            <input class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" disabled type="password" name="password" id="password">
        </div>
        <div class="col-span-2 md:col-span-1 hidden hiddenElements">
            <label for="">Cédula profesional</label>
            <input class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" type="number" name="cedProf" id="cedProf">
        </div>
        <div class="col-span-2 md:col-span-1 hidden hiddenElements">
            <label for="">Nivel escolar</label>
            <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" name="nivelEscolar" id="nivelEscolar">
                <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="1">Primer nivel</option>
                <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="2">Segundo nivel</option>
                <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="3">Tercer nivel</option>
                <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="4">Cuarto nivel</option>
                <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="5">Quinto nivel</option>
                <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="6">Sexto nivel</option>
            </select>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById('passwordGenerate').onclick(function(){
                if(document.getElementById('name').value != "" && document.getElementById('mail').value != "")
                {
                    var regOficial = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        
                    if(regOficial.test(document.getElementById('mail').value))
                    {
                        document.getElementsByClassName('hiddenElements').toogleClass('hidden')
                    }
                    else
                    {
                        //ERROR
                    }
                }
                else
                {
                    //ERROR
                }
            });
        });
    </script>
@endsection

        