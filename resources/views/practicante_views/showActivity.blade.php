@extends('mainLayout')
    <title>Mostrar actividades</title> 
@section('body')
    <div class="border-2 gap-4 px-8 py-2 md:px-20 md:py-10 mt-10 mx-12">
        <div class="grid grid-cols-2 w-full gap-4 px-2 py-2">
            <div class="w-4/5 col-span-1 md:col-span-1 md:rounded-lg bg-blue-700">
                <h1 class="ml-4 col-span-2 text-3xl md:text-4xl pl-auto text-white">{{$actividad->titulo}}</h1>
            </div>
            <div class="w-full col-span-2 md:col-span-1 md:rounded-lg">
                <p class="text-xl">{{$actividad->descripcion}}<br>{{$actividad->fechaInicio}} - {{$actividad->fechaCierre}}</p>
            </div>
        </div>
        <div class="grid grid-cols-2 w-full gap-4 px-2 py-2">
            <label class="mb-2 ml-4 text-base font-bold text-blue-700 tracking-wide" for="">Preguntas</label>
            <div class="w-full my-4 ml-4 col-span-2 md:col-span-1">
                @foreach ($preguntaActiv as $preguntAc)
                    <label for="">{{$preguntaAc}}</label>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection