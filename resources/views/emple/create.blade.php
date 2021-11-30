<x-layout>
    <form action="{{ route('emple.store', [], false) }}" method="POST">
        <x-emple.form
            :empleado="$empleado"/>
    </form>
</x-layout>
