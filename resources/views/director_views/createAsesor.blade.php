@extends('mainLayout')
 
@section('body')
    <div class="grid grid-cols-2 gap-4 px-8 py-2 md:px-20 md:py-4">    
        <div class="col-span-2 text-3xl md:text-4xl bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Datos del asesor </h1>
            </div>
        </div>
        <div class="col-span-2 pt-2">
            <div class="flex bg-green-500 rounded-lg p-4 mb-4 text-sm text-white" id="alertContainer" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium" id="alertText">Todo bien hasta el momento</span> 
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
        <div class="col-span-2 md:col-span-1 flex items-center">
            <button id="passwordGenerate" class="bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6">Generar contraseña</button>
        </div>
        <div class="col-span-2 md:col-span-1">
            <label for="">Contraseña</label>
            <input class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" disabled type="password" name="password" id="password">
        </div>
    </div>
    <form action="{{route('director.saveAsesor')}}" method="post">
        <div class="grid grid-cols-2 gap-4 px-8 py-2 md:px-20 md:py-4 hidden hiddenElements">
            <div class="col-span-2 md:col-span-1">
                @csrf
                <input class="hidden" type="text" id="userId" name="userId">
                <label for="">Cédula profesional</label>
                <input class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" type="number" name="cedProf" id="cedProf">
            </div>
            <div class="col-span-2 md:col-span-1">
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
            <div class="col-span-2">
                <button type="submit" class="bg-green-500 rounded-lg font-bold text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-green-700 mr-6">Guardar asesor</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            @isset($alert)
                {!!$alert!!}
            @endisset
            $('#passwordGenerate').on('click', function(){
                if(document.getElementById('name').value != "" && document.getElementById('mail').value != "")
                {
                    var regOficial = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        
                    if(regOficial.test(document.getElementById('mail').value))
                    {
                        Swal({
                            title: "Espera un momento...",
                            text: "Estás por crear un usuario ¿Confirmas que los datos son correctos?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: "{{ route('director.createUser')}}",
                                    data: {
                                        'name'  : $('#name').val(),
                                        'email' : $('#mail').val(),
                                        "_token": "{{csrf_token()}}"
                                    },
                                    dataType:"json",
                                    method: "POST",
                                    success: function(response)
                                    {
                                        if (response.status == 'ok')
                                        {
                                            $('#password').val(response.hashedPassword);
                                            $('#userId').val(response.userId);
                                            $('.hiddenElements').removeClass('hidden').addClass('block');
                                            $('#alertContainer').removeClass('bg-red-600').addClass('bg-green-500');
                                            $('#alertText').html('Todo bien hasta el momento');
                                        }
                                        else if(response.status == 'mailRepeat')
                                        {
                                            $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                                            $('#alertText').html('Correo repetido, intenta con uno diferente');
                                        }
                                        else
                                        {
                                            $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                                            $('#alertText').html('Error interno, recarga la página y vuelve a intentarlo');
                                        }
                                    },
                                    fail: function(){
                                    }
                                });
                                $('#alertText').html('Todo bien hasta el momento');
                            }
                        });
                        /*Swal.fire({
                            title: 'Estás por crear un usuario ¿Confirmas que los datos son correctos?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Estoy seguro',
                            denyButtonText: 'No estoy seguro',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                
                            }
                        })*/
                    }
                    else
                    {
                        $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                        $('#alertText').html('Formato de correo inválido');
                    }
                }
                else
                {
                    $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                    $('#alertText').html('Debes ingresar un nombre y correo');
                }
            });
        });
    </script>
@endsection

        