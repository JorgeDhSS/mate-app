@extends('mainLayout')
@section('body')
@csrf
<!---
<div class="py-16 bg-gray-50 overflow-hidden">
    
        
               
        <div>
            <span class="text-gray-600 text-lg font-semibold">Main features</span>
        </div>
        
            <div class="mt-16 grid border divide-x divide-y rounded-xl overflow-hidden sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-4">
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    @foreach(App\Cuadernillo::get() as $cuadernillo) 
                    <h2 class="mt-4 text-2xl text-gray-900 font-bold md:text-4xl">{{$cuadernillo->nombre}} <br class="lg:block" hidden> and finance</h2>
                    <div class="relative p-8 space-y-8">
                        <div class="space-y-2">
                            <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">{{$cuadernillo->tema}}</h5>
                        </div>
                            <input type="button" value="Ver actividades" class="border-b text-center bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer">
                            <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>    
        
    </div>
</div>
<div class="flex flex-wrap -mx-3 p-3 mb-6 text-black">
-->

    
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
                        <Button class="bg-blue-600 hover:bg-blue-700 text-white hover:text-black font-semibold py-2 px-4 rounded shadow">
                            Ver actividades
                        </Button>
                    </div>
                </div> 
                   
            </div>
        </div>
    </div>
    @endforeach
x   

@endsection	
