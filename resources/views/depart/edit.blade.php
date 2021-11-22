<x-layout>
    <x-depart.form
        :action="'/depart/'. $departamento->id"
        :method="'PUT'"
        :departamento="$departamento" />
</x-layout>
