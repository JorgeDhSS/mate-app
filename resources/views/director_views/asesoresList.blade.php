<div class="flex flex-wrap w-full">
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Nombre
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Cedula Profesional
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Email
    </div>
</div>
@foreach($asesors as $a)
    <div class="flex flex-wrap w-full">
        <br>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$a->name}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$a->cedProfesional}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$a->email}}
        </div>
        <div class="w-1/4 text-center  text-sm font-bold  tracking-wide">
            <a name="deleteAsesor" id="deleteAsesor" href="{{route('director.eliminarAsesor', ['id' => $a->user_id, 'id2' => $a->asesor_id])}}" class="w-full bg-green-100 rounded-lg font-bold text-green-700 text-center px-2 py-2 transition duration-300 ease-in-out hover:bg-green-700 hover:text-green-100 mr-6">Eliminar</a>
        </div>
    </div>
@endforeach