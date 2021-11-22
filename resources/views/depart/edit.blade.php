<x-layout>
    <form action="/depart/{{ $departamento->id }}" method="POST">
        @method('PUT')
        <x-depart.form
            :denominacion="$departamento->denominacion"
            :localidad="$departamento->localidad" />
    </form>
</x-layout>
