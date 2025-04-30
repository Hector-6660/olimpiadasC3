<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Resultado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('resultados.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="id" class="block text-gray-700">Id</label>
                            <input type="text" name="id" id="id" value="{{ old('id') }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="palmares" class="block text-gray-700">Palmarés</label>
                            <textarea id="tinymce" name="palmares" id="palmares" class="w-full border-gray-300 rounded-md">
                                <table>
                                    <thead>
                                        <tr>
                                            @foreach ($categorias as $categoria)
                                                <th>{{ $categoria->nombre }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($categorias as $categoria)
                                                <td>
                                                    <ol>
                                                        <li>Vencedor 1</li>
                                                        <li>Vencedor 2</li>
                                                        <li>Vencedor 3</li>
                                                    </ol>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </textarea>
                        </div>
                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
