<table class="table col-12">
    <thead>
        <tr>
            <td>Nombre</td>
            <td>CURP</td>
            <td>Numero de telefono</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            @isset($tutores)
            @foreach($tutores as $tutor)
            @if( $tutor->name == $buscado)
                <td>{{$tutor->name}}</td>
                <td>{{$tutor->CURP}}</td>
                <td>{{$tutor->numberPhone}}</td>
            @endif
            @endforeach
            @endisset
        </tr>
    </tbody>
</table>