@extends('mainLayout')

@section('body')
<form action="{{route('asesor_views.respuestas')}}" method="post" submit="" id="addActividad" name="addActividad">
    <!-- component -->
    <div class="container mb-2 flex mx-auto w-full items-center justify-center">
		<ul class="flex flex-col p-8">
			<li class="border-green-400 flex flex-row">
				<div class=" flex flex-1 items-center p-4 transition duration-500  transform hover:-translate-y-2 rounded-2xl border-2 p-6 hover:shadow-2xl border-green-500">
					<div class="flex-1 pl-1 mr-64">
						<div class="font-medium">
							Actividad 1
						</div>
					</div>
					<div class="w-1/4 flex-col rounded-md  justify-center items-center mr-10 p-2">
                        <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()" class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide
                            font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
					</div>
				</div>
			</li>
		</ul>
	</div>
</form>

@endsection