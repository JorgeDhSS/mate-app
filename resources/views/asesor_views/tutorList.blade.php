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
            @foreach($tutores as $tutor)
            @if( $tutor->name == 'Pietro')
                <td class="border px-4 py-2">{{$tutor->name}}</td>
                <td class="border px-4 py-2">{{$tutor->CURP}}</td>
                <td class="border px-4 py-2">{{$tutor->numberPhone}}</td>
            @endif
            @endforeach
        </tr>
    </tbody>
</table>