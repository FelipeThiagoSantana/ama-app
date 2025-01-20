<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              {{ __('Atendimento nº:').' '. $nroAtendimento}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="flex items-center justify-between">
                        <div><strong>{{$atendimento->cliente->nome}}</strong></div>
                        <div><p>ID Atendimento: #{{$atendimento->id}}</p></div>
                    </div>
                    <hr>
                    <div class="m-4">
                        <p>Status: <strong>{{$atendimento->status}}</strong></p>
                        <br>
                        <p>Inicio: <strong>{{$atendimento->hora_inicio}}</strong> Fim: <strong>{{$atendimento->hora_fim}}</strong></p>
                        <br>
                        <p> Valor Cobrado: <strong>{{$atendimento->valor_atendimento}}</strong></p>
                        <br>
                        <p> Tipo do atendimento: <strong>{{$atendimento->tipo_atendimento}}</strong></p>
                        <br>
                        <p> Frequencia: <strong>{{$atendimento->frequencia_atendimento}}</strong></p>
                        <br>

                        <p> Observações: <strong>{!! $atendimento->observacoes ?? ' ' !!}</strong></p>
                    </div>
                    <hr>

                    <div class="text-gray-900 dark:text-gray-100 m-4">
                        <div class="flex items-center justify-between flex-wrap font-light">
                            <div>
                                <strong>Criado em:</strong>
                                <p>{{$atendimento->created_at->format('d/m/Y') ?? ' '}}</p>
                            </div>
                            <div>
                                <strong>Última edição:</strong>
                                <p>{{$atendimento->updated_at->format('d/m/Y') ?? ' '}}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('atendimento.edit', $atendimento->id)}}">
                        <x-default-button class="bg-orange-500 hover:bg-orange-400">
                            <i class="fa-solid fa-pen-to-square"></i>
                            {{ __('Editar') }}
                        </x-default-button>
                    </a>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <div class="flex items-center justify-between">
                            <strong>Evolução</strong>
                        </div>
                        <hr  class="mb-4">
                        <x-default-button class=" bg-blue-500 mb-4">Criar evolução</x-default-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
