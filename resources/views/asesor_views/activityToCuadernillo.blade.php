@extends('mainLayout')
 
@section('body')
<form action="{{route('asesor.actividadToCuadernillo.store')}}" method="post">
    <div class="grid grid-cols-4 gap-4 px-8 py-2 md:px-20 md:py-4">    
        <div class="col-span-4 text-3xl md:text-4xl bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Asignar actividad a cuadernillo </h1>
            </div>
        </div>
        @csrf
        <div class="col-span-4 md:col-span-2 grid grid-cols-2  pl-4">
            <div class="col-span-2">
                <h1 class="font-extrabold text-lg text-blue-700"> Seleccione las actividades a asignar </h1>
            </div>
            @foreach($activities as $activity)
            <div class="col-span-2 p-4 flex flex-wrap border border-2 border-green-500 bg-green-700 text-gray-300 hover:bg-green-500 activityContainer">
                    <div class="w-1/5"><input type="checkbox" name="activities[]" value="{{$activity->id}}" class="border border-gray-600"></div>
                    <div class="w-2/5 pb-4 pl-4"> 
                        <div class="w-full text-left">
                            <label class="font-bold">Título: </label>
                        </div>
                        <div class="w-full text-center">
                            <label class="pl-4">{{$activity->titulo}}</label>
                        </div>
                    </div>
                    <div class="w-2/5 pb-4 pl-4"> 
                        <div class="w-full text-left">
                            <label class="font-bold">Descripción: </label> 
                        </div>
                        <div class="w-full text-center">
                            <label class="pl-4">{{$activity->descripcion}}</label>
                        </div>
                    </div>
                    <div class="w-1/5"></div>
                    <div class="w-2/5 pb-4 pl-4"> 
                        <div class="w-full text-left">
                            <label class="font-bold">Fecha de inicio: </label> 
                        </div>
                        <div class="w-full text-center">
                            <label class="pl-4">{{$activity->fechaInicio}}</label>
                        </div>
                    </div>
                    <div class="w-2/5 pb-4 pl-4"> 
                        <div class="w-full text-left">
                            <label class="font-bold">Fecha de cierre: </label> 
                        </div>
                        <div class="w-full text-center">
                            <label class="pl-4">{{$activity->fechaCierre}}</label>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
        <div class="col-span-4 md:col-span-2 grid grid-cols-2  pl-4">
            <h1 class="col-span-2 font-extrabold text-lg text-blue-700"> Cree el cuadernillo </h1>
            <div class="col-span-2">
                <label for="nombre">Nombre del cuadernillo</label>
            </div>
            <div class="col-span-2 pb-2">
                <input type="text" name="nombre" id="nombre" class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">
            </div>
            <div class="col-span-2">
                <label for="tema">Tema</label>
            </div>
            <div class="col-span-2 pb-2">
                <input type="text" name="tema" id="tema" class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500">
            </div>
        </div>
        <div class="col-span-4 text-center">
            <button type="submit" class="bg-blue-500 rounded-lg font-bold text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-700 mr-6"> Guardar actividad en el cuadernillo</button>
        </div>
    </div>
</form>
@endsection
@section('scripts')
    <script type="text/javascript">
        @isset($alert)
                {!!$alert!!}
            @endisset
        $(document).ready(function() {
            @isset($alert)
                {!!$alert!!}
            @endisset
            $('.activityContainer').on('click', function(){
                if($(this).find('input[name="activities[]"]').is(':checked'))
                {
                    $(this).find('input[name="activities[]"]').prop("checked", false).trigger('change');
                }
                else
                {
                    $(this).find('input[name="activities[]"]').prop("checked", true).trigger('change');
                }
            });
        });
        function selectActivity()
        {

        }
    </script>
@endsection