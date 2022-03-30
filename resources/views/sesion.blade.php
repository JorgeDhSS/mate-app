@extends('mainLayout')
 
 @section('body')
 <div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
 style="background-image: url(Users/macbook/Downloads/WRITING_JavierLopez.jpeg);">
	<div class="absolute bg-black opacity-60 inset-0 z-0"></div>
	<div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl z-10">
		<div class="text-center">
			<h2 class="mt-6 text-3xl font-bold text-gray-900">
				INICIO DE SESIÓN
			</h2>	
		</div>
		
		<div class="flex items-center justify-center space-x-2">
			<span class="h-px w-16 bg-gray-300"></span>
			<span class="text-gray-500 font-normal">Bienvenido a mate-app</span>
			<span class="h-px w-16 bg-gray-300"></span>
		</div>
		<form class="mt-8 space-y-6" action="" method="POST">
			@csrf
			<input type="hidden" name="remember" value="true">
            <div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Nombre</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-500 focus:outline-none focus:border-green-500" name="name" type=" " placeholder="Nombre de usuario" >
            </div>
			<div class="relative">
				<div class="absolute right-0 mt-4"><svg xmlns="http://www.w3.org/2000/svg"
						class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
					</svg>
                </div>
				<label class="text-sm font-bold text-gray-700 tracking-wide">Correo electrónico</label>
				<input class=" w-full text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="email" type="" placeholder="Dirección de correo electrónico" >
            </div>
			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Contraseña</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="password" type="" placeholder="Ingresa tu contraseña" >
            </div>

			<div class="mt-8 content-center">
				@error('messageUserNotFound')
				<p class="border-b border-red-500 rounded-md bg-red-100 w-full text-red-500 p-2 my-2">Usuario no encontrado </p>
				@enderror
				@error('messageInvalidedData')
				<p class="border-b border-red-500 rounded-md bg-red-100 w-full text-red-500 p-2 my-2">Datos con formato invalido </p>
				@enderror
				
				
            </div>
			<div class="flex items-center justify-between">
					<div class="flex items-center">
						<input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 bg-indigo-500 focus:ring-indigo-400 border-gray-300 rounded">
						<label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Recordar
                        </label>
					</div>
				<div class="text-sm">
					<a href="#" class="font-medium text-green-500 hover:text-green-500">
								¿Olvidaste tu contraseña?
					</a>
				</div>
			</div>
			<div>
				<button type="submit" class="w-full flex justify-center bg-green-300 text-gray-100 p-4  rounded-full tracking-wide
                                font-semibold  focus:outline-none focus:shadow-outline hover:bg-green-500 shadow-lg cursor-pointer transition ease-in duration-300">
                    INICIAR SESIÓN
                </button>
			</div>
			
		</form>
	</div>
</div>
 @endsection

 