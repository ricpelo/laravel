<x-layout>
    <form action="{{ route('depart.update', $depart) }}" method="POST">
        @method('PUT')
        <x-depart.form
            :departamento="$depart" />
    </form>
</x-layout>
