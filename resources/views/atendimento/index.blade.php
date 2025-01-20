<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meus atendimentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-blue-button>
                        <a href="{{ route('atendimento.create') }}">
                            <i class="fa-solid fa-notes-medical"></i>
                            {{ __('Novo Atendimento') }}
                        </a>
                    </x-blue-button>
                </div>

                <x-calendar>

                </x-calendar>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    </div>
                    <table class="table-auto w-full">
                        <thead class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                        <tr>
                            <th class="p-2">Paciente</th>
                            <th class="p-2">data Consulta</th>
                            <th class="p-2">Início</th>
                            <th class="p-2">Fim</th>
                            <th class="p-2">Valor</th>
                            <th class="p-2">Tipo Atendimento</th>
                            <th class="p-2">Detalhes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($atendimentos as $atendimento)
                            <tr class="hover:bg-gray-200 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 leading-tight">
                                <td class="text-center p-2">{{ $atendimento->cliente->nome }}</td>
                                <td class="text-center p-2">{{  \Carbon\Carbon::parse($atendimento->data_atendimento)->format('d-m-Y') }}</td>
                                <td class="text-center p-2">{{ \Carbon\Carbon::parse($atendimento->hora_inicio)->format('H:i:s') }}</td>
                                <td class="text-center p-2">{{ \Carbon\Carbon::parse($atendimento->hora_fim)->format('H:i:s') }}</td>
                                <td class="text-center p-2">
                                    R$ {{ number_format($atendimento->valor_atendimento, 2, ',', '.') }}</td>
                                <td class="text-center p-2">{{ $atendimento->tipo_atendimento}}</td>
                                <td class="text-center p-2">
                                    <a href="{{ route('atendimento.show', $atendimento->id) }}" class="">
                                        Ver Mais
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4 text-gray-500">
                                    Nenhum atendimento encontrado.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
