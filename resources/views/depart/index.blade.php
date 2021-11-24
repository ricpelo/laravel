<x-layout>
    <x-depart.search/>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Departamentos</h1>
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        @php
                            $link = e("denominacion=" . old('denominacion') . "&localidad=" . old('localidad'));
                        @endphp
                        <th class="px-6 py-2 text-xs text-gray-500">
                            <a href="/depart?orden=denominacion&{!! $link !!}">
                                Denominación
                            </a>
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            <a href="/depart?orden=localidad&{!! $link !!}">
                                Localidad
                            </a>
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Editar
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Borrar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($departamentos as $depart)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $depart->denominacion }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $depart->localidad }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/depart/{{ $depart->id }}/edit"
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="px-4 py-1 text-sm text-white bg-red-400 rounded">Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="/depart/create" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo departamento</a>
    </div>
    {{ $departamentos->links() }}
</x-layout>
