<x-layout>
    <table>
        <thead>
            <th>Denominación</th>
            <th>Localidad</th>
        </thead>
        <tbody>
            @foreach ($departamentos as $depart)
                <tr>
                    <td>{{ $depart->denominacion }}</td>
                    <td>{{ $depart->localidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
