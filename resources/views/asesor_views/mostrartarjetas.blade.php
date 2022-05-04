@foreach ($actividades as $actividad)
<div class="container mb-2 flex mx-auto w-full items-center justify-center">
    <ul class="flex flex-col p-4">
            <div class="select-none flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-2xl border-2 p-6 hover:shadow-2xl border-red-400">
                <div class="flex-1 pl-1 mr-16">
                    <div class="font-medium">
                        <h3>{{$actividad->titulo}}</h3>
                    </div>
                    <div>
                        <label for="">{{$actividad->frechaInicio}}</label>
                    </div>
                </div>
                <div class="">
                    <input type="button" id="pregunta" name="pregunta" value="Agregar Pregunta"  class=" bg-green-500 text-gray-100 p-4 rounded-full tracking-wide font-bold py-2 px-8 focus:outline-none focus:shadow-outline hover:bg-green-700 shadow-lg cursor-pointer ">
                </div>
            </div>
    </ul>
</div>
@endforeach