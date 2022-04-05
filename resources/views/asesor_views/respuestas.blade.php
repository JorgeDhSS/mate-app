    <header class="interfaz_Principal">
	 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <div class="titulo_seri">
            <h2 class="titulo-1">Serigrafía</h2>
        </div>
        <div class="titulo_cata">
            <h1 class="titulo-2">Catálogos</h1>
        </div>
    </header>

    <div class="crear_nuevo_catalogo w-full max-w-lg" id="crearNuevoC">
        <div class="flex flex-wrap -mx-3 mb-6 text-black">
            <div class="w-2/3">
                <h3 class="text-xl">Ingresar Datos</h3>
            </div>
            <div class="w-1/3">
                <button class="bg-transparent" onclick="document.getElementById('crearNuevoC').style.display='none';" class="imagen_cerrar"><img src="../image/error.png" alt="cerrar"></button class="bg-transparent">
            </div>
            <form action="{{route('asesor_views.respuestas')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6 ">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_nombre">
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white input_nombre">
                        @error('nombre')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                    </div><br>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_categoria">
                        <label for="categoria">Categoría: </label>
                        <input type="text" name="categoria" id="categoria" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white input_categoria">
                        @error('categoria')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                    </div><br>
                    <h3 class="w-full text-xl">Agregar un diseño</h3>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_foto">
                        <label for="foto">Foto: </label>
                        <input type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white input_foto">
                        @error('foto')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                    </div><br>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_textura">
                        <label for="textura">Textura: </label>
                        <input type="text" name="textura" id="textura" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @error('textura')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                    </div><br>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 label_color">
                        <label for="color">Color: </label>
                        <input type="color" name="color" id="color" class="appearance-none block w-full text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @error('color')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                    </div><br>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 label_dimensionX">
                        <label for="dimension_x">Dimensión X </label>
                        <input type="number" name="dimension_x" id="dimension_x" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @error('dimension_x')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                    </div><br>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 label_dimensionY">
                        <label for="dimension_y">Dimensión Y </label>
                        <input type="number" name="dimension_y" id="dimension_y" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @error('dimension_y')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                    </div><br>
                    <div class="botones_crear_cata">
                        <input type="submit" value="Aceptar" class="crear_cata_enviar">
                        <input type="button" value="Cancelar" class="crear_cata_cancelar" onclick="document.getElementById('crearNuevoC').style.display='none';">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 p-3 mb-6 text-black">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <div class="nuevo-catalogo">
                <img src="../image/photo-icon.png" alt="nuevo_catalogo" class="imagen-catalogo">
                <button id="newCatalog" class="link_crear_catalogo">Nuevo catálogo</button>
            </div>
        </div>

    

    <script>
        
        @if(Session::has('success'))
            Swal.fire(
                {
                    icon: 'success',
                    title: '¡Listo!',
                    text: '{{Session::get("success")}}',
                    showConfirmButton: false,
                    timer: 1500
                }
            )
        @endif
        @if(Session::has('error'))
            Swal.fire(
                {
                    icon: 'error',
                    title: '¡Error!',
                    text: '{{ Session::get("error") }}',
                    showConfirmButton: false,
                    timer: 1500
                }
            )
        @endif
    </script>