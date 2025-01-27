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
                    <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">

                        <p>Paciente:  <strong>{{$financeiro->cliente->nome}}</strong></p>
                        <hr>
                        <br>
                        <form action="{{ route('financeiro.update', $financeiro->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="flex items-center justify-between" >
                            <div>
                                <label for="status_pagamento">Status do Pagamento:</label>
                                <select name="status_pagamento" id="status_pagamento"
                                        class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                                        required>
                                    <!-- Opção inicial como um placeholder -->
                                    <option value="" disabled {{ empty($financeiro->status_pagamento) ? 'selected' : '' }}>
                                        Selecione o status
                                    </option>
                                    <!-- Opções fixas -->
                                    <option value="pendente" {{ $financeiro->status_pagamento === 'pendente' ? 'selected' : '' }}>
                                        Pendente
                                    </option>
                                    <option value="pago" {{ $financeiro->status_pagamento === 'pago' ? 'selected' : '' }}>
                                        Pago
                                    </option>
                                    <option value="cancelado" {{ $financeiro->status_pagamento === 'cancelado' ? 'selected' : '' }}>
                                        Cancelado
                                    </option>
                                </select>

                            </div>
                            <div>
                                <div class="flex flex-col p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                    <label for="valor_atendimento">Valor Recebido:</label>
                                    <div class="flex flex-row">
                                        <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker">R$</span>
                                        <input type="number" placeholder="0,00" name="valor_atendimento" id="valor_atendimento" class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm"  value="{{$financeiro->valor_atendimento ?? ''}}" required>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="flex flex-col p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                            <label for="observacoes">Observação:</label>
                            <x-quill-editor id="observacoes" name="observacoes" value="{{$financeiro->observacoes ?? ''}}">
                            </x-quill-editor>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class=" p-4 rounded overflow-hidden">
                                <input type="submit" value="Confirmar"
                                       class="hover:bg-blue-400 group flex items-center rounded bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm">
                            </div>
                             <div>
                                 <a href="{{route('financeiro.show', $financeiro->id)}}">
                                 <input type="submit" value="Cencelar"
                                        class="hover:bg-red-400 group flex items-center rounded bg-red-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm ">
                                 </a>
                             </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
