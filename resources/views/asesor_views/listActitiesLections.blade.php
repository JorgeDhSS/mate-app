@extends('mainLayout')
 
@section('body')
<form action="{{route('asesor.actividadToCuadernillo.store')}}" method="post">
    <div class="w-full flex flex-wrap px-8 py-2 md:px-20 md:py-4">    
        <div class="w-full text-3xl md:text-4xl bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Asignar lección a actividad</h1>
            </div>
        </div>
        <div class="w-full">
            <h1 class="font-extrabold text-lg text-blue-700"> Seleccione las actividades a asignar </h1>
        </div>
        @foreach($activities as $activity)
        <div class="w-full md:w-1/2 p-8">
            <div class="p-4 flex flex-wrap justify-center border border-2 border-green-500 bg-green-700 text-gray-300">
                <div class="w-2/4 pb-4 pl-8"> 
                    <div class="w-full text-left">
                        <label class="font-bold">Título: </label>
                    </div>
                    <div class="w-full text-center">
                        <label class="pl-4">{{$activity->titulo}}</label>
                    </div>
                </div>
                <div class="w-2/4 pb-4 pl-8"> 
                    <div class="w-full text-left">
                        <label class="font-bold">Descripción: </label> 
                    </div>
                    <div class="w-full text-center">
                        <label class="pl-4">{{$activity->descripcion}}</label>
                    </div>
                </div>
                <div class="w-2/4 pb-4 pl-8"> 
                    <div class="w-full text-left">
                        <label class="font-bold">Fecha de inicio: </label> 
                    </div>
                    <div class="w-full text-center">
                        <label class="pl-4">{{$activity->fechaInicio}}</label>
                    </div>
                </div>
                <div class="w-2/4 pb-4 pl-8"> 
                    <div class="w-full text-left">
                        <label class="font-bold">Fecha de cierre: </label> 
                    </div>
                    <div class="w-full text-center">
                        <label class="pl-4">{{$activity->fechaCierre}}</label>
                    </div>
                </div>
                <div class="w-2/4 pb-4 pl-8">
                    <select class="leccion text-black" id="{{$activity->id}}">
                        <option>Selecciona una opción</option>
                        @foreach($leccions as $lection)
                            <option value="{{$lection->id}}">{{$lection->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</form>
@endsection
@section('scripts')
<script type="text/javascript" src="jquery.numeric.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#name').numeric();
            $('.leccion').on('change', function(){
                if($(this).val() != "")
                {
                    id_activity = $(this).attr("id");
                    id_leccion = $(this).val();
                    let form = document.createElement('form');
                    form.action = "{{route('asesor.actividadesLeccion.put')}}";
                    form.method = 'POST';
                    form.innerHTML = '<input name="id_activity" value="'+id_activity+'" class="hidden"> <input name="id_leccion" value="'+id_leccion+'" class="hidden"> <input name="_token" value="{{csrf_token()}}" class="hidden">';

                    // the form must be in the document to submit it
                    document.body.append(form);

                    form.submit();

                    Swal({
                        title:"Asiganación realizada",
                        icon: "success"
                    });
                }
            });
        });
        function selectActivity()
        {
            window.location.reload()
        }
    </script>
@endsection