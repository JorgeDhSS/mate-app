
<header class="interfaz_Principal">
        <div class="titulo_cata">
        <div class="bg-blue-700">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">                
                <h1 style="font-size: 32px;" class="font-extrabold; text-white pl-16 "> Actividad nueva</h1>
            </div>
            </div>

        </div>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </header>

    <form action="{{route('addActividades.agrega')}}" method="post" id="addActividad" name="addActividad">
        @csrf
        <div class=" " >  
            <div class="container mx-auto mt-4 ">
                <div class="grid grid-cols-2">
                    <div>
                        <label >Inicia: </label>
                        <input type="date" name="fechaInicio" class="w-1/2 border-2 rounded-md mt-2 block">
                    </div>

                    <div>
                        <label class="">Termina: </label>
                        <input type="date" name="fechaTermina" class="w-1/2 border-2 rounded-md mt-2 block">
                    </div>
                </div>
            </div>  

            <div class="container mx-auto mt-4 ">
                <div class="grid grid-cols-2">
                    <div>
                        <label>grupo: </label>
                        <select name="selecionaGrupo" id="selecionaGrupo" class="w-1/2 py-2 text-base border-2 mt-2 block rounded-md">  
                            <option class="bg-white" value="1">Grupo</option> 
                            @foreach(App\Grupo::get() as $grupo)
                                <option class="bg-white" value="{{$grupo->id}}">{{$grupo->nombreGrupo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="">Valor: </label>
                        <input type="" class="w-1/2 text-base border-2 py-2  mt-2 block rounded-lg" name="valorActividad">
                    </div>
                </div>
            </div>        
             
            <div class=" container mx-auto mt-4">
                <label class=" ">Nombre de la actividad</label>
                <input type="" class="w-3/4 py-2 border-2 mt-4 block rounded-md" name="nombreActividad">
            </div>
            
            <div class="container mx-auto  mt-4">
                <label class="">Descripción de la catividad </label>
                <textarea name="descripcionActividad" class="w-3/4 h-32 border-2 mt-4 block rounded-md" style=""></textarea>
            </div>
            
            <div class=" w-4/6 mt-4" align="right" >
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 border-b-23 transition delay-150 duration-300 ease-in-out rounded ">
                    Guardar 
                </button>
            </div>
                
        </div>
    </form>