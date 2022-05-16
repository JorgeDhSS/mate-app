@extends('mainLayout')
 
 @section('body')

 @if(Session::has('Datos_incorrectos'))
 <div role="alert">
	 <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
	 Error al intentar verificar credenciales
	 </div>
	 <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
		 <p>{{session('Datos_incorrectos')}}</p>
	 </div>
 </div>


	 
 @endif
    
	
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
		<form class="mt-8 space-y-6" action="" method="POST">
			@csrf
			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Nombre</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" name="name" type="text " placeholder="Nombre de usuario" value ="{{ old('name') }}" > 
                {!! $errors->first('name','<span class="helpblock">:message</span>')!!}
            </div>
			<div class="relative">
				<div class="absolute right-0 mt-4"><svg xmlns="http://www.w3.org/2000/svg"
						class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
					</svg>
                </div>
				<label class="text-sm font-bold text-gray-700 tracking-wide">Correo electrónico</label>
				<input class=" w-full text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="email" type="text" placeholder="Dirección de correo electrónico" value ="{{ old('email') }}"> 
                {!! $errors->first('email','<span class="helpblock">:message</span>')!!}
            </div>
			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Clave de recuperación</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="claverecuperacion" type="text" placeholder="Ingresa tu clave de recuperación" > 
				{!! $errors->first('claverecuperacion','<span class="helpblock">:message</span>')!!}
            </div>

			<div class="mt-8 content-center">
				
				
				
            </div>
			<div>
				<button type="submit" class="w-full flex justify-center bg-green-500 text-gray-100 p-4  rounded-full tracking-wide
                                font-semibold  focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer transition ease-in duration-300">
                    Verificar información
                </button>
			</div>
			
		</form>
	</div>
</div>

 @endsection