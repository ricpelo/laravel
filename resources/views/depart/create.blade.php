<x-layout>
    <form action="{{ route('depart.store', [], false) }}" method="POST">
        <x-depart.form
            :departamento="$departamento"/>
    </form>
</x-layout>
