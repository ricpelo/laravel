<x-layout>
    <form action="{{ route('depart.update', $departamento->id, false) }}" method="POST">
        @method('PUT')
        <x-depart.form
            :departamento="$departamento" />
    </form>
</x-layout>
