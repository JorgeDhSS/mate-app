@extends('mainLayout')
 
 @section('body')
 <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">Sugerencia</p>
      <p class="text-sm">Asegurate de crear una contraseña de al menos 6 caracteres, recuerda incluir letras mayúsculas, minúsculas asi como al menos un número.</p>
    </div>
  </div>
</div>

 @if(Session::has('Datos_incorrectos'))
	<div role="alert">
		<div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
		Algo salio mal!
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
			
			<span class="text-gray-500 font-normal"></span>
			
		</div>
		<form class="mt-8 space-y-6" action="{{route('recuperarcuenta.authenticateR')}}" method="POST">
			@csrf

			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Clave de recuperación</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="claverecuperacion" id="claverecuperacion" type="text" placeholder="Ingresa tu clave de recuperación" value ="{{ old('claverecuperacion') }}"> 

            </div>

			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Contraseña nueva</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="newpassword" type="password" placeholder="Ingresa tu contraseña nueva"  value ="{{ old('newpassword') }}"> 

            </div>
			<div class="mt-8 content-center">
				<label class="text-sm font-bold text-gray-700 tracking-wide">Confirma tu contraseña nueva</label>
				<input class="w-full content-center text-base py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" name="newpasswordC" type="password" placeholder="Ingresa nuevamente tu contraseña nueva" value ="{{ old('newpassword') }}"> 

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

 @section('scripts')
 <script>
	 $(document).ready(function() {
            @isset($alert)
                {!!$alert!!}
            @endisset
        });

 </script>
 @endsection