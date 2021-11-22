<x-layout>
    <form action="{{ route('depart.store', [], false) }}" method="POST">
        <x-depart.form
            :denominacion="''"
            :localidad="''"/>
    </form>
</x-layout>
