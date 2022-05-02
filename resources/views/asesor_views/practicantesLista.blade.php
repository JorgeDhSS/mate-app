<div class="flex flex-wrap w-full">
    <div class="w-1/4 font-bold">
        Nombre
    </div>
    <div class="w-1/4 font-bold">
        Matricula
    </div>
    <div class="w-1/4 font-bold">
        Nivel Escolar
    </div>
    <div class="w-1/4 font-bold">
        Selección
    </div>
</div>
@foreach($users as $u)
    <div class="flex flex-wrap w-full">
        <div class="w-1/4">
            {{$u->name}}
        </div>
        <div class="w-1/4">
            {{$u->practicante->matricula}}
        </div>
        <div class="w-1/4">
            {{$u->practicante->nivelEscolar}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            <input type="checkbox" name="idPracticante" id="idPracticante" value="{{$u->practicante->id}}">
            {{$u->practicante->id}}
        </div>
    </div>
@endforeach