<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{--  {{ __('Detalhes do Paciente') }}--}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Dados do Paciente </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 m-4">Dados Cadastrais do Paciente</p>
                    <strong class="text-gray-900 dark:text-gray-100 mb-4 pb-3">Nome:</strong> {{$cliente->nome}}
                    <br>
                    <strong>Sexo:</strong> {{ $cliente->sexo ?? 'Não informado' }}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 mb-8 pb-3">Email:</strong> {{$cliente->email}}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 mb-4 pb-5">CPF:</strong> {{$cliente->cpf}}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 mb-4 pb-3">Telefone:</strong> {{$cliente->telefone}}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 mb-4 pb-3">Status:</strong>
                    @if($cliente->status == 1)
                        Ativo
                    @else
                        Inativo
                    @endif
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100">Data de Nascimento:</strong>
                    {{ \Carbon\Carbon::parse($cliente->dataNascimento)->format('d/m/Y') }}
                    <div class="mt-4">
                        <x-default-button class="bg-orange-500 hover:bg-orange-400">
                            <a href="{{route('cliente.edit', $cliente->id)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('Editar') }}
                            </a>
                        </x-default-button>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Anaminese</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 m-4">Entrevista detalhada do paciente</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
