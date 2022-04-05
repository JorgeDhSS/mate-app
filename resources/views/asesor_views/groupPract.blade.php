@extends('mainLayout')
    <title>Agrupar practicantes</title>
 
@section('body')
    @csrf
    <form action="">
        
        <div class="grid grid-cols-2 w-full gap-4 px-8 py-2 md:px-20 md:py-10">
            <div class="w-full col-span-2 md:col-span-1">
                <h1 class="ml-4 col-span-2 text-3xl md:text-4xl text-blue-600 pl-auto">Agrupar practicante</h1>
            </div>
            <div class="col-span-2 md:col-span-1 w-full">
                <div class="flex bg-green-500 rounded-lg p-4 mb-4 text-sm text-white" id="alertContainer" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium text-base" id="alertText">Todo bien hasta el momento</span> 
                    </div>
                </div>
            </div>
            <div class="w-full my-4 ml-4 col-span-2 md:col-span-1">
                <label class="mb-2 ml-4 text-base font-bold text-gray-700 tracking-wide" for="">Nombre del grupo: </label>
                <input class="px-4 py-2 ml-2 content-center text-base border-b border-gray-500 focus:outline-none focus:border-green-500 w-2/5" name="btnNamegroup" id="btnNamegroup" type="text" onchange="">
                <button id="btnSearchNameGroup" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" disabled=true>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
            <div class="w-full my-4 ml-4 col-span-2 md:col-span-1">
                <label class="mb-2 ml-4 text-base font-bold text-gray-700 tracking-wide" for="">Buscar practicante: </label>
                <input class="ml-2 px-4 py-2 content-center text-base border-b border-gray-500 focus:outline-none focus:border-green-500 w-2/5" name="btnSearchPract" id="btnSearchPract" type="text">
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" disabled=true>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                </button>
            </div>
            <div class="w-full my-4 ml-4 col-span-2 md:col-span-1">
                <label class="mb-2 ml-4 text-base font-bold text-gray-700 tracking-wide" for="">Seleccionar nivel escolar: </label>
                <select class="pl-2 ml-2 px-4 py-2 content-center text-base border-b border-gray-500 focus:outline-none focus:border-green-500 w-2/5" name="levelSchool" id="levelSchool">
                    <option value="">Seleccionar grupo</option>
                    <option value=1>Primero</option>
                    <option value=2>Segundo</option>
                    <option value=3>Tercero</option>
                    <option value=4>Cuarto</option>
                    <option value=5>Quinto</option>
                    <option value=6>Sexto</option>
                </select>
                
            </div>
            <div class="my-2 ml-4 col-span-2 md:col-span-1" id="table">
                <table class="table-auto">
                    <thead class="bg-gray-100">
                        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Nombre</th>
                        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Matrícula</th>
                        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Nivel escolar</th>
                        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Acción</th>
                    </thead>
                    <tbody>
                        @foreach($resultados as $resultado)
                            <tr>
                                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide">{{ $resultado->name }}</td>
                                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide">{{ $resultado->matricula }}</td>
                                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide">{{ $resultado->nivelEscolar }}</td>
                                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide"><input type="checkbox" name="btncheckbox[]" value="{{ $resultado->id }}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full my-4 ml-4 col-span-2 md:col-span-1">
                <button class="bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6">Nuevo practicante</button>
            </div>
            <div class="my-2 ml-4 col-span-2 md:col-span-1">
                <input class="pl-auto bg-blue-100 rounded-lg font-bold text-blue-700 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 hover:text-blue-100 mr-6" name="btnEnviar" id="btnEnviar" value="Crear grupo" type="button">
            </div>
        </div>
    </form>
        
@endsection
@section('scripts')
    <script type="text/javascript">
        var cambioSelect;

        $(document).ready(function(){

            //Ajax buscar nombre del grupo existente
            $('#btnNamegroup').on('change', function(){
                var nombreGrupo = document.getElementById('btnNamegroup').value;
                Swal({
                    title:"Buscando el nombre del grupo...",
                    //text: "Estás por crear un usuario ¿Confirmas que los datos son correctos?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('asesor.searchNameGroup')}}",
                            data: {
                                'nombreGrupo' : nombreGrupo,
                                "_token": "{{csrf_token()}}"
                            },
                            dataType:"json",
                            method: "POST",
                            success: function(response){
                                if (response.status == 'ok'){
                                    $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                                    $('#alertText').html('Error, nombre del grupo en uso');
                                }else{
                                    $('#alertContainer').removeClass('bg-red-600').addClass('bg-green-500');
                                    $('#alertText').html('Todo bien hasta el momento');
                                }
                            },fail: function(){
                            }
                        });
                        $('#alertText').html('Todo bien hasta el momento');
                    }
                });
            });

            $('#levelSchool').on('change', function(){
                cambioSelect = document.getElementById('levelSchool').value;
            });

            //Enviar los datos para crear un nuevo grupo
            $('#btnEnviar').on('click', function(){
                var seleccion = new Array();
                if ('input:checkbox:checked') {
                    var nameGroup = document.getElementById('btnNamegroup').value;
                    if (nameGroup == "") {
                        $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                        $('#alertText').html('Error, nombre del grupo vacío');
                    }else{
                        $('input:checkbox:checked').each(function(){
                            seleccion.push($(this).val());
                        });
                        Swal({
                            title:"Creando un nuevo grupo",
                            text: "Espere un momento...",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: "{{ route('asesor.saveGroup')}}",
                                    data: {
                                        'nameGroup' : nameGroup,
                                        'practicante' : seleccion,
                                        "_token": "{{csrf_token()}}"
                                    },
                                    dataType:"json",
                                    method: "POST",
                                    success: function(response){
                                        /*if (response.status == 'ok'){
                                            $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                                            $('#alertText').html('Error, nombre del grupo en uso');
                                        }else{
                                            $('#alertContainer').removeClass('bg-red-600').addClass('bg-green-500');
                                            $('#alertText').html('Todo bien hasta el momento');
                                        }*/
                                    },fail: function(){
                                    }
                                });
                                $('#alertText').html('Todo bien hasta el momento');
                            }
                        });
                    }
                }else{
                    $('#alertContainer').addClass('bg-red-600').removeClass('bg-green-500');
                    $('#alertText').html('Error, debe seleccionar al menos un practicante');
                    //return;
                }
            });
        });

    </script>
@endsection