<x-layout>
    <form action="{{ route('alumnos.update', $alumno->id, false) }}" method="POST">
        @method('PUT')
        <x-alumnos.form :alumno="$alumno" />
    </form>
</x-layout>
