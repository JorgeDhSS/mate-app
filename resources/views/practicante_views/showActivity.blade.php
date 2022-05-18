@extends('mainLayout')
    <title>Mostrar actividad</title> 
@section('body')
    <div class="border-2 gap-4 px-8 py-2 md:px-20 md:py-10 mt-10 mx-12">
        <div class="grid grid-cols-2 w-full gap-4 px-2 py-2">
            <div class="w-4/5 col-span-1 md:col-span-1 md:rounded-lg bg-blue-700">
                {{--{{json_encode($actividad)}}--}}
                <h1 class="ml-4 col-span-2 text-3xl md:text-4xl pl-auto text-white">{{$actividad->titulo}}</h1>
            </div>
            <div class="w-full col-span-2 md:col-span-1 md:rounded-lg">
                <p class="text-xl">{{$actividad->descripcion}}<br>Fecha de inicio: {{$actividad->fechaInicio}} - Fecha de cierre: {{$actividad->fechaCierre}}</p>
            </div>
        </div>
        <form action="{{route('practicante.sendAnswers')}}" id="formulario" method="post">
            @csrf
            <input type="hidden" name="idCuadernillo" value="{{$idCuadernillo}}">
            <input type="hidden" name="idActivity" value="{{$actividad->id}}">
            @if($preguntaActiv->count() > 0)
                <div class="grid grid-cols-2 w-full gap-4 px-2 py-2 border-2 mt-4">
                    <label class="mb-2 ml-4 text-2xl font-bold text-blue-700 tracking-wide col-span-2" for="">Preguntas</label>
                    @foreach($preguntaActiv as $preguntaAc)
                        <div class="w-full my-4 ml-4 col-span-2 md:col-span-2 flex flex-wrap">
                            <div class="w-1/2">
                                <label class="text-lg font-bold" for="">Pregunta: </label>
                                <label class="text-lg" for="">{{$preguntaAc->pregunta}}</label>
                            </div>
                            <div class="w-1/2">
                                <label class="text-lg" for="">Elige la respuesta</label>
                                <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full answer" name="respuesta[{{$preguntaAc->id}}]">
                                    <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="">Selecciona una respuesta</option>
                                    @foreach(App\respuesta::where('idPregunta', $preguntaAc->id)->get() as $respuesta)
                                        <option class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 w-full" value="{{$respuesta->id}}">{{$respuesta->respuesta}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                    <div class="w-full my-4 ml-4 col-span-2 md:col-span-2 flex flex-wrap justify-center">
                        <button id="btnSub" type="button" class="bg-blue-500 rounded-lg font-bold text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-green-700 mr-6">Responder actividad</button>
                    </div>
                </div>
            @else
                No hay actividades
                <div class="w-full my-4 ml-4 col-span-2 md:col-span-2 flex flex-wrap justify-center">
                    <a href="{{route('practicante_views.actividadesMostrar', ['id' => $idCuadernillo])}}" class="bg-blue-500 rounded-lg font-bold text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-green-700 mr-6">Otra actividad</a>
                </div>
            @endif
        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        @isset($alert)
            {!!$alert!!}
        @endisset
        $('#btnSub').on("click", function (){
            flag = false;
            $('.answer option:selected').each(function(){
                if($(this).val() != "")
                {
                    flag = true;
                }
            });
            alert(flag)
            if(flag)
            {
                Swal({
                    title: "Espera un momento...",
                    text: "Hay preguntas sin respuesta, dichas preguntas no serán contabilizadas por el sistema",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        formulario.submit();
                    }
                });
            }
            else
            {
                formulario.submit();
            }
        });
        
    </script>
@endsection