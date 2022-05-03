<div class="flex flex-wrap w-full">
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Nombre
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        CURP
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Numero de telefono 
    </div>
    <div class="w-1/4 font-bold text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
        Selección
    </div>
</div>
@foreach($tutors as $t)
    <div class="flex flex-wrap w-full">
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$t->name}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$t->curp}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            {{$t->numberPhone}}
        </div>
        <div class="w-1/4 text-center border-2 text-sm font-bold text-gray-700 tracking-wide">
            <input type="checkbox" name="idTutor" id="idTutor" value="{{$t->id}}">
            {{$t->id}}
        </div>
    </div>
@endforeach
