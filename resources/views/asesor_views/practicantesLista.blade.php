<div class="flex flex-wrap w-full">
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Nombre
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Matricula
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Nivel Escolar
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Selección
    </div>
</div>
@foreach($users as $u)
    <div class="flex flex-wrap w-full">
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$u->name}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$u->practicante->matricula}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$u->practicante->nivelEscolar}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            <input type="checkbox" name="idPracticante" id="idPracticante" value="{{$u->practicante->id}}">
            {{$u->practicante->id}}
        </div>
    </div>
@endforeach