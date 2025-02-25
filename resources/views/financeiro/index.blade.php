<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Financeiro') }}
        </h2>
    </x-slot>

    <div class="grid flex-wrap grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white m-8 dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center ">
            <div class="bg-green-500 text-white rounded-full p-4">
                <i class=" text-4xl fa-solid fa-cash-register" ></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Atendimentos Recebidos</h2>
                <p class="text-4xl font-bold text-green-500 mt-2">{{ $atendimentosRecebidos }}</p>
            </div>
        </div>


        <div class="bg-white m-8 dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center">
            <div class="bg-red-500 text-white rounded-full p-4">
                <i class=" text-4xl fa-solid fa-cash-register" ></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Atendimentos Pendentes</h2>
                <p class="text-4xl font-bold text-red-500 mt-2">{{ $atendimentosPendentes }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6  max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Card Total Recebido -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Total Recebido</h2>
            <p class="text-4xl font-bold text-green-500 mt-4">
                R$ {{ number_format($totalRecebido, 2, ',', '.') }}
            </p>
        </div>

        <!-- Card Total a Receber -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Total a Receber</h2>
            <p class="text-4xl font-bold text-red-500 mt-4">
                R$ {{ number_format($totalAReceber, 2, ',', '.') }}
            </p>
        </div>
    </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                        <tr>
                            <th class="p-2">Id</th>
                            <th class="p-2">Paciente</th>
                            <th class="p-2">Data Consulta</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Valor</th>
                            <th class="p-2">Tipo Atendimento</th>
                            <th class="p-2">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($financeiros as $financeiro)
                            <tr class="hover:bg-gray-200 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 leading-tight">
                              <td class="text-center p-2">{{ $financeiro->atendimento_id }}</td>
                                <td class="text-center p-2">{{ $financeiro->cliente->nome }}</td>
                                <td class="text-center p-2">{{  \Carbon\Carbon::parse($financeiro->atendimento->data_atendimento)->format('d-m-Y') }}</td>
                                <td class="text-center p-2">{{ $financeiro->status_pagamento}}</td>
                                <td class="text-center p-2">
                                    R$ {{ number_format($financeiro->valor_atendimento, 2, ',', '.') }}</td>
                                <td class="text-center p-2">{{ $financeiro->tipo_atendimento}}</td>
                                <td class="text-center p-2">
                                    <a href="{{ route('financeiro.show', $financeiro->id) }}" class="">
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
