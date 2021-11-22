<x-layout>
    <form action="{{ route('depart.update', $departamento->id, false) }}" method="POST">
        @method('PUT')
        <x-depart.form
            :denominacion="$departamento->denominacion"
            :localidad="$departamento->localidad" />
    </form>
</x-layout>
