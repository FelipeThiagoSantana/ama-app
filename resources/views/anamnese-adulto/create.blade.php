<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Anamnese do Paciente: ') }} {{ $cliente->nome }}
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
                    <form
                        action="{{ route('anamnese-adulto.store', ['cliente' => $cliente->id]) }}"
                        method="POST">
                        @csrf
                        <fieldset class="border-2 rounded p-6">
                            <legend> Preencha a Anamnese</legend>

                            <input class=" rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm" type="hidden"
                                   name="user_id" value="{{Auth::user()->id}}">

                            <div
                                class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                <label for="name">Nome Completo:</label>
                                <input type="text" name="nome" id="name"
                                       class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                                       value="{{ $cliente->nome }}" autofocus>
                            </div>

                            <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                <label for="sexo">Sexo:</label>
                                <select name="sexo" id="sexo"
                                        class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                                        autofocus>
                                    <option value="">Selecione</option>
                                    <option
                                        value="Masculino" {{ old('sexo', $cliente->sexo ?? '') == 'Masculino' ? 'selected' : '' }}>
                                        Masculino
                                    </option>
                                    <option
                                        value="Feminino" {{ old('sexo', $cliente->sexo ?? '') == 'Feminino' ? 'selected' : '' }}>
                                        Feminino
                                    </option>
                                    <option
                                        value="Outro" {{ old('sexo', $cliente->sexo ?? '') == 'Outro' ? 'selected' : '' }}>
                                        Outro
                                    </option>
                                </select>
                            </div>
                            <div class=" p-4 rounded overflow-hidden">
                                <label for="dataNascimento">Data de Nascimento:</label>
                                <input type="date" value="{{$cliente->dataNascimento}}" name="dataNascimento"
                                       id="dataNascimento"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm">
                            </div>

                            <x-anamnese-adulto :cliente="$cliente" :anamnese="$anamnese">
                            </x-anamnese-adulto>

                            <div class="flex items-center justify-between">
                                <div class=" p-4 rounded overflow-hidden">
                                    <input type="submit" value="Cadastrar"
                                           class="hover:bg-blue-400 group flex items-center rounded bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm">
                                </div>


                                <div>
                                    <input type="submit" value="Limpar"
                                           class="hover:bg-red-400 group flex items-center rounded bg-red-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm ">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
