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
        <div class="w-1/4">
            <input type="checkbox" name="" id="{{$u->practicante->id}}">
        </div>
    </div>
@endforeach