<!--<table class="table-auto">-->
    <!--<thead class="bg-gray-100">
        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Nombre</th>
        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Matrícula</th>
        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Nivel escolar</th>
        <th class="border-2 px-4 py-2 text-base font-bold text-gray-700 tracking-wide">Acción</th>
    </thead>
    <tbody>-->
        @foreach($practicantesBuscar as $buscarPracticante)
            <tr>
                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide">{{ $buscarPracticante->name }}</td>
                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide">{{ $buscarPracticante->matricula }}</td>
                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide">{{ $buscarPracticante->nivelEscolar }}</td>
                <td class="text-center border-2 px-4 py-2 text-sm font-bold text-gray-700 tracking-wide"><input type="checkbox" name="btncheckbox[]" value="{{ $buscarPracticante->id }}"></td>
            </tr>
        @endforeach
    <!--</tbody>-->
<!--</table>-->