@extends('mainLayout')
@section('body')
@csrf
    @foreach(App\Cuadernillo::get() as $cuadernillo) 
    <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">
        <div class="w-full max-w-sm md:w-1/3 p-3 mb-6 md:mb-0">
            <div class="rounded overflow-hidden shadow-lg">
                <div class="titulo_cata">
                    <div class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500">
                        <div class="px-6 py-4 ">
                            <div class="font-bold text-xl mb-2 ">{{$cuadernillo->nombre}}</div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <div class="flex flex-wrap -mx-3 mb-6 text-black">
                        {{$cuadernillo->tema}}
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <a class="bg-blue-600 hover:bg-blue-700 text-white hover:text-black font-semibold py-2 px-4 rounded shadow" href="{{route('practicante_views.actividadesMostrar', $cuadernillo->id)}}">
                            Ver actividades
                        </a>
                    </div>
                </div> 
                   
            </div>
        </div>
    </div>
    @endforeach 

@endsection	
