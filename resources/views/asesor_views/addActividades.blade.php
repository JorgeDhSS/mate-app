
<header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Actividad nueva</h1>
            </div>
            </div>

        </div>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script src="jquery.numeric.js"></script>
    </header>
    <script type="text/javascript">
        $(document).ready(function(){
            ValidarNumeros()
        })
        function ValidarNumeros(){
            $('.valorActividad').numeric({
                negative:false
            })
        }

        function EnviarDatos(){
            addActividad.submit();
        }
    </script>

    <form action="{{route('addActividades.agrega')}}" method="post" submit="" id="addActividad" name="addActividad">
        @csrf
        <div class="grid grid-cols-2 gap-4 px-8 py-2 md:px-20 md:py-10">
            <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                <label >Inicia: </label>
                <input type="date" name="fechaInicio" class="w-full border-2 rounded-md mt-2 block">
            </div>

            <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                <label class="">Termina: </label>
                <input type="date" name="fechaTermina" class="w-full border-2 rounded-md mt-2 block">
            </div>

            <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                <label>grupo: </label>
                <select name="selecionaGrupo" id="selecionaGrupo" class="w-full py-2 text-base border-2 mt-2 block rounded-md">  
                    <option class="bg-white" value="1">Grupo</option> 
                    @foreach(App\Grupo::get() as $grupo)
                        <option class="bg-white" value="{{$grupo->id}}">{{$grupo->nombreGrupo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                <label class="">Valor: </label>
                <input type=""  class=" w-full text-base border-2 py-2  mt-2 block rounded-lg  " id="valorActividad" name="valorActividad">
            </div>
             
            <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                <label class=" ">Nombre de la actividad</label>
                <input type="" class="w-full py-2 border-2 mt-4 block rounded-md" name="nombreActividad">
            </div>
            
            <div class="col-span-2 md:col-span-1 text-3xl md:text-4xl">
                <label class="">Descripción de la catividad </label>
                <textarea name="descripcionActividad" class="w-full h-32 border-2 mt-4 block rounded-md" style=""></textarea>
            </div>
            
            <div class="w-wull mt-4" align="right" >
                <input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="EnviarDatos()" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 border-b-23 transition delay-150 duration-300 ease-in-out rounded ">
            </div>
                
        </div>
    </form>


