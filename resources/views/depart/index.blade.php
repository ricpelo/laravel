<x-layout>
    <div class="flex justify-center mx-auto">
        <div class="flex flex-col">
            <h1 class="text-center mb-4 text-2xl font-semibold">Departamentos</h1>

            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Denominación
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Localidad
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
                                        <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Borrar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
