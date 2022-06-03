@extends('mainLayout')
    <title>Modificar información personal</title> 
@section('body')
<div class="w-full flex flex-wrap py-0">
    <div class="w-full px-8 py-2 md:px-20 md:py-4">
        <div class="w-full bg-blue-700 md:rounded-lg h-16">
            <h1 class="ml-8 col-span-2 text-3xl md:text-4xl pl-auto text-white font-bold my-8">Modificar información</h1>
        </div>
        {{--<input type="text" value="{{auth()->user()->id}}">--}}
    </div>
    <div class="w-full max-w-xl border m-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('data.guardarCambios')}}" method="POST" id="frmUpdateData"> {{--action="{{route('data.guardarCambios')}}"--}}
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <input type="hidden" name="claverecuperacion" id="claverecuperacion" value="{{$datos->claverecuperacion}}">
                <div class="col-span-2 md:col-span-2 mb-4">        
                    <label class="block text-lg font-bold text-blue-700 tracking-wide mb-2" for="username">
                        Nombre completo
                    </label>
                    <input class="ml-2 px-4 py-2 content-center text-base border-b border-gray-500 focus:outline-none focus:border-green-500 w-full" id="username" name="username" type="text" value="{{$datos->name}}">
                </div>
                <div class="col-span-2 md:col-span-2 mb-4">        
                    <label class="block text-lg font-bold text-blue-700 tracking-wide mb-2" for="username">
                        Correo electronico
                    </label>
                    <input class="ml-2 px-4 py-2 content-center text-base border-b border-gray-500 focus:outline-none focus:border-green-500 w-full" id="email" name="email" type="email" value="{{$datos->email}}">
                </div>
                
                <div class="flex items-center justify-between">
                    <input type="button" id="generarclave" value="Generar clave" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
                
                <div class="flex items-center justify-between">
                    <input type="button" id="btnEnviar" value="Guardar información" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </form>
        {{--<p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>--}}
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script type="text/javascript">
    
        $(document).ready(function(){
            $('#btnEnviar').on('click', function(){
                if ($('#username').val() == '' || $('#email').val() == ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No puede dejar campos vacios'
                        //footer: '<a href="">Why do I have this issue?</a>'
                    });
                }
                else if ($('#claverecuperacion').val() == ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Por favor genere una clave para recuperar su cuenta en caso de perdida'
                        //footer: '<a href="">Why do I have this issue?</a>'
                    });
                }
                /*if ($('#password').val() != $('#passwordConfir').val()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La contraseña no es igual'
                        //footer: '<a href="">Why do I have this issue?</a>'
                    });
                } else {
                    $('#passwordCorrect').val($('#password').val());
                }*/
                if ($('#username').val() != '' && $('#email').val() != '') {
                    document.forms["frmUpdateData"].submit();
                }
            });
        });

        var btnClave = document.getElementById("generarclave");
        btnClave.addEventListener("click", function(){
            var pass = '';
            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 
                    'abcdefghijklmnopqrstuvwxyz0123456789@#$';
              
            for (i = 1; i <= 15; i++) {
                var char = Math.floor(Math.random()
                            * str.length + 1);
                  
                pass += str.charAt(char)
            }
            $("input[name='claverecuperacion']").val(pass);
            

            const doc = new jsPDF();

            doc.setFontSize(22);
            doc.text(pass, 20,10);
            doc.save("clave.pdf");
            
        });
    </script>
@endsection