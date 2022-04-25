<div class="flex flex-wrap w-full">
    <div class="w-1/4 font-bold">
        Nombre
    </div>
    <div class="w-1/4 font-bold">
        CURP
    </div>
    <div class="w-1/4 font-bold">
        Numero de telefono 
    </div>
    <div class="w-1/4 font-bold">
        Selección
    </div>
</div>
@foreach($tutors as $t)
    <div class="flex flex-wrap w-full">
        <div class="w-1/4">
            {{$t->name}}
        </div>
        <div class="w-1/4">
            {{$t->curp}}
        </div>
        <div class="w-1/4">
            {{$t->numberPhone}}
        </div>
        <div class="w-1/4">
            <input type="checkbox" name="" id="{{$t->id}}">
            {{$t->id}}
        </div>
    </div>
@endforeach