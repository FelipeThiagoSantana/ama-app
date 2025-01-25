<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evolução:')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('msg'))
                        <p class="bg-blue-500 p2 rounded text-center text-white mb4">
                            {{session('msg')}}
                        </p>
                    @endif
                        <form action="{{ route('evolucao.store', ['cliente' => $cliente->id, 'atendimento' => $atendimento->id]) }}" method="POST">
                            @csrf
                            <fieldset class="border-2 rounded p-6">
                                <legend>Detalhes da Evolução</legend>
                                <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                                <input type="hidden" name="atendimento_id" value="{{ $atendimento->id }}">

                                <div class="mb-4">
                                    <label for="evolucao">Evolução:</label>
                                    <x-quill-editor id="evolucao" name="evolucao" class="h-8">

                                    </x-quill-editor >
                                </div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
                            </fieldset>

                        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
