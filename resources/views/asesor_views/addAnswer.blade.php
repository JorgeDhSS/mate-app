@extends('mainLayout')
 
 @section('body')
    <header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8 ">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 justify-center"> Agregar respuestas</h1>
            </div>
            </div>

        </div>
       
    </header>
    <div class="flex items-center justify-center ">
    <div class="flex border-2 border-gray-200 rounded">
        <input type="text" class="px-4 py-2 w-80" placeholder="Nombre de la activiad">
        <button class="w-full flex justify-center bg-green-500 text-gray-100 p-4 tracking-wide font-semibold  focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer transition ease-in duration-300">
            Buscar
        </button>
    </div>
</div>
 @endsection
 