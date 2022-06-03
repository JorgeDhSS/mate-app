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
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            {{$u->name}}
        </div>
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            {{$u->practicante->matricula}}
        </div>
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            {{$u->practicante->nivelEscolar}}
        </div>
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            <input class="items-center" type="checkbox" name="idPracticante[]" id="idPracticante" value="{{$u->practicante->id}}">
        </div>
    </div>
@endforeach