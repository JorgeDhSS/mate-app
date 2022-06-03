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
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            {{$t->name}}
        </div>
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            {{$t->curp}}
        </div>
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            {{$t->numberPhone}}
        </div>
        <div class="w-1/4 h-20 w-auto text-center border-2 text-sm font-bold text-gray-700 tracking-wide break-all">
            <input type="radio" name="idTutor" id="idTutor" value="{{$t->id}}" required>
            {{$t->id}}
        </div>
    </div>
@endforeach
