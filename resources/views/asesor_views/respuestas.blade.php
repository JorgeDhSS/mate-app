@extends('mainLayout')
           
    @section('body')
        <form action="{{route('respuesta.guardarPregunta')}}" method="post" submit="" id="addActividad" name="addActividad">
            <div class="w-full bg-blue-200 h-screen">
                <input type="hidden" name="jsonPreguntas">
                <select name="selecionaGrupo" id="selecionaGrupo" class="w-full border-2 rounded-md mt-2 block text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">  
                    <option class="bg-white" value="">Grupo</option> 
                    @foreach(App\Grupo::get() as $grupo)
                        <option class="bg-white" value="{{$grupo->id}}">{{$grupo->nombreGrupo}}</option>
                    @endforeach
                </select>
                <div class="contenedor" id="contenedor">
                    
                </div>
                
            </div>
        </form>
    @endsection	
    @section('scripts')
        <script type="text/javascript">
        $(document).ready(function(){
            $('#selecionaGrupo').on('change', function(){
                var grupoId = $(this).val();
                    $.get('/addActividades/mostrarActividades/'+grupoId, function(res){
                        console.log(res);
                        var html_select = '<option class="bg-white" value="">Título de la actividad</option>';
                        for (var i=0; i<res.length; i++){
                            html_select += 
                            '<div class="container mb-2 flex mx-auto w-full items-center justify-center">'+
                                '<ul class="flex flex-col p-4">'+
                                        '<div class="select-none flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-2xl border-2 p-6 hover:shadow-2xl border-red-400">'+
                                            '<div class="flex-1 pl-1 mr-16">'+
                                                '<div class="font-medium">'+
                                                    '<h3>'+res[i].titulo+'</h3>'+
                                                '</div>'+
                                                '<div>'+
                                                    '<label for="">'+res[i].fechaInicio+'</label>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="">'+
                                                '<input type="button" id="pregunta" name="pregunta"  class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">'+
                                            '</div>'+
                                        '</div>'+
                                '</ul>'+
                            '</div>';
                        }
                        $('#contenedor').html(html_select);
                    }); 
            }); 
        });        

        </script>
    @endsection
            

        