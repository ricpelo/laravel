@csrf
<div class="mb-6">
    <label for="denominacion"
        class="text-sm font-medium text-gray-900 block mb-2 @error('denominacion') text-red-500 @enderror">
        Denominación
    </label>
    <input type="text" name="denominacion" id="denominacion"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('denominacion') border-red-500 @enderror"
        value="{{ old('denominacion', $departamento->denominacion) }}">
    @error('denominacion')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="localidad"
        class="text-sm font-medium text-gray-900 block mb-2 @error('localidad') text-red-500 @enderror">
        Localidad
    </label>
    <input type="text" name="localidad" id="localidad"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('localidad') border-red-500 @enderror"
        value="{{ old('localidad', $departamento->localidad) }}">
    @error('localidad')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
<a href="/depart"
    class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
