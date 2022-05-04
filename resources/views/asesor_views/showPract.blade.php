<div class="flex flex-wrap w-full">
    <div class="w-1/4 font-bold text-center text-base mb-2 border-2 border-gray-500">
        Nombre
    </div>
    <div class="w-1/4 font-bold text-center text-base mb-2 border-2 border-gray-500">
        Matricula
    </div>
    <div class="w-1/4 font-bold text-center text-base mb-2 border-2 border-gray-500">
        Nivel Escolar
    </div>
    <div class="w-1/4 font-bold text-center text-base mb-2 border-2 border-gray-500">
        Selección
    </div>
</div>
@foreach($users as $u)
    <div class="flex flex-wrap w-full">
        <div class="w-1/4 text-center text-base text-gray-700 border border-gray-300">
            {{$u->name}}
        </div>
        <div class="w-1/4 text-center text-base text-gray-700 border border-gray-300">
            {{$u->practicante->matricula}}
        </div>
        <div class="w-1/4 text-center text-base text-gray-700 border border-gray-300">
            {{$u->practicante->nivelEscolar}}
        </div>
        <div class="w-1/4 text-center text-base text-gray-700 tracking-wide border border-gray-300 items-center">
            <input class="items-center" type="checkbox" name="idPracticante[]" id="idPracticante" value="{{$u->practicante->id}}">
        </div>
    </div>
@endforeach