<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Financeiro') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <Strong>Dados do Atendimento</Strong>
                    <hr>
                    <br>
                    <p>ID Atendimento: <strong>{{$financeiro->atendimento->id}}</strong> </p>
                    <br>
                    <p>Nome Paciente:  <strong>{{$financeiro->cliente->nome}}</strong></p>
                   <br>
                    <p>Tipo de Atendimento: <strong>{{$financeiro->tipo_atendimento}}</strong></p>
                    <br>
                    <p>Valor do Atendimento: <strong>R${{$financeiro->valor_atendimento}}</strong></p>
                    <br>
                    <p>Status Pagamento: <strong>{{$financeiro->status_pagamento}}</strong></p>
                    <br>
                    <p>Data do Atendimento: <strong>{{ \Carbon\Carbon::parse($financeiro->atendimento->data_atendimento)->format('d-m-Y')}}</strong></p>
                    <br>
                    <p>Horario Atendimento: <strong>{{ ($financeiro->atendimento->hora_inicio)}} </strong> às  <strong>{{ ($financeiro->atendimento->hora_fim)}} </p>
                    <hr>
                    <br>
                    <a href="{{ route('financeiro.edit', $financeiro->id) }}" class="">
                        <x-default-button class="bg-blue-500" hover="bg-blue-400">
                            Editar
                        </x-default-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
