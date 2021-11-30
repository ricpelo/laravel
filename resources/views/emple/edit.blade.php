<x-layout>
    <form action="{{ route('emple.update', $empleado->id, false) }}" method="POST">
        @method('PUT')
        <x-emple.form
            :empleado="$empleado" />
    </form>
</x-layout>
