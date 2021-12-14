<x-layout>
    <form action="{{ route('alumnos.store', [], false) }}" method="POST">
        <x-alumnos.form :alumno="$alumno"/>
    </form>
</x-layout>
