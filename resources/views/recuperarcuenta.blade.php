@extends('mainLayout')
 
 @section('body')


	
 <div class="relative min-h-screen flex items-center justify-center bg-purple-500 py-12 px-4 sm:px-6 lg:px-8 bg-purple-500 bg-no-repeat bg-cover relative items-center">

	<div class="absolute bg-blue-200 opacity-60 inset-0 z-0"></div>
	<div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl z-10">
		<div class="text-center">
			<h2 class="mt-6 text-3xl font-bold text-gray-900">
				Recuperar cuenta
			</h2>	
		</div>
		
		<div class="flex items-center justify-center space-x-2">
			<span class="h-px w-16 bg-gray-300"></span>
			<span class="text-gray-500 font-normal">Bienvenido a mate-app</span>
			<span class="h-px w-16 bg-gray-300"></span>
		</div>
		<form class="mt-8 space-y-6" action="{{route('recuperarcuenta.authenticateR')}}" method="POST">
			@csrf

			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Clave de recuperación</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="claverecuperacion" di="claverecuperacion" type="text" placeholder="Ingresa tu clave de recuperación" > 

            </div>

			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Nombre nuevo</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="newname" type="text" placeholder="Ingresa tu nombre nuevo" > 

            </div>
			<div class="mt-8 content-center">
            </div>
			<div>
				<button type="submit" class="w-full flex justify-center bg-green-500 text-gray-100 p-4  rounded-full tracking-wide
                                font-semibold  focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer transition ease-in duration-300">
                    Cambiar contraseña
                </button>
			</div>
			
		</form>
	</div>
</div>

 @endsection