@extends('mainLayout')
@section('body')
@csrf
@foreach($actividades as $actividad) 
    <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">
        <div class="w-full max-w-sm md:w-1/3 p-3 mb-6 md:mb-0">
            <div class="rounded overflow-hidden shadow-lg">
                <div class="titulo_cata">
                    <div class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500">
                        <div class="px-6 py-4 ">
                            <div class="font-bold text-xl mb-2 ">{{$actividad->titulo}}</div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <div class="flex flex-wrap -mx-3 mb-6 text-black">
                        {{$actividad->fechaInicio}}
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <div class="flex flex-wrap -mx-3 mb-6 text-black">
                            {{$actividad->fechaCierre}}
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            

                    </div>
                </div> 
                   
            </div>
        </div>
    </div>
    @endforeach 
@endsection	
@section('scripts')
    <script type="text/javascript">
        @isset($alert)
            {!!$alert!!}
        @endisset
        $('#btnSub').on("click", function (){
            flag = false;
            $('.answer option:selected').each(function(){
                if($(this).val() != "")
                {
                    flag = true;
                }
            });
            alert(flag)
            if(flag)
            {
                Swal({
                    title: "Espera un momento...",
                    text: "Hay preguntas sin respuesta, dichas preguntas no serán contabilizadas por el sistema",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        formulario.submit();
                    }
                });
            }
            else
            {
                formulario.submit();
            }
        });
        
    </script>
@endsection
@section('scripts')
    <script type="text/javascript">
        @isset($alert)
            {!!$alert!!}
        @endisset
    </script>
@endsection