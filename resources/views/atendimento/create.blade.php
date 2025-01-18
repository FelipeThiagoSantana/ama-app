<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pacientes') }}
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
                        <!-- Adicione o jQuery UI para autocomplete -->
                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        @if(session('msg'))
                                            <p class="bg-blue-500 p2 rounded text-center text-white mb4">
                                                {{session('msg')}}
                                            </p>

                                        @endif
                                        <form action="{{ route('atendimento.store') }}" method="post">
                                            @csrf
                                            <fieldset class="border-2 rounded p-6">
                                                <legend>Novo Atendimento</legend>

                                                <input class=" rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm" type="hidden"
                                                       name="user_id" value="{{Auth::user()->id}}">

                                                <div class="mt-4">
                                                    <div
                                                        class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                                        <label for="name">Buscar Paciente:</label>
                                                        <input type="text" name="cliente_nome" id="cliente"
                                                               class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                                                               required autofocus>
                                                        <input type="hidden" id="cliente_id" name="cliente_id">
                                                        @error('cliente_id')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                                    <label for="status">Status do Atendimento:</label>
                                                    <select name="status" id="status"
                                                            class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800" required autofocus>
                                                        <option value="">Selecione</option>
                                                        @foreach($statusOptions as $status)
                                                            <option value="{{ $status }}" {{ isset($atendimento) && $atendimento->status == $status ? 'selected' : '' }}>
                                                                {{ ucfirst($status) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                                    <label for="frequencia_atendimento">Frequencia do Atendimento:</label>
                                                    <select name="frequencia_atendimento" id="frequencia_atendimento"
                                                            class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                                                            autofocus>
                                                        <option value="">Selecione</option>
                                                        <option
                                                            value="semanal">
                                                            Semanal
                                                        </option>
                                                        <option
                                                            value="quinzenal">
                                                            Quizenal
                                                        </option>
                                                        <option
                                                            value="mensal">
                                                            Mensal
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="flex flex-col p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                                    <label for="valor_atendimento">Valor do Atendimento:</label>
                                                    <div class="flex flex-row">
                                                        <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker">R$</span>
                                                        <input type="number" placeholder="0,00" name="valor_atendimento" id="valor_atendimento" class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                                                    </div>
                                                </div>

                                                <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                                    <label for="tipo_atendimento">Tipo de Atendimento:</label>
                                                    <select name="tipo_atendimento" id="tipo_atendimento"
                                                            class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                                                            autofocus>
                                                        <option value="">Selecione</option>
                                                        <option
                                                            value="online">
                                                           Online
                                                        </option>
                                                        <option
                                                            value="presencial">
                                                           Presencial
                                                        </option>
                                                        <option
                                                            value="presencialGupo">
                                                           Presencial em Gupo
                                                        </option>
                                                        <option
                                                            value="onlineGupo">
                                                           Online em Gupo
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class=" p-4 rounded overflow-hidden">
                                                    <label for="data_atendimento">Data de Atendimento</label>
                                                    <input type="date" name="data_atendimento" id="data_atendimento"
                                                           class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                                                </div>

                                                <div class="p-4 rounded overflow-hidden block mt-1 w-full">
                                                    <label for="hora_inicio">Hora Início):</label>
                                                    <div class="flex gap-4">
                                                        <input type="time" name="hora_inicio" id="hora_inicio"
                                                               class="w-1/2 rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                                                               required>
                                                    </div>

                                                    <label for="hora_fim">Hora  Fim:</label>
                                                    <div class="flex gap-4">
                                                        <input type="time" name="hora_fim" id="hora_fim"
                                                               class="w-1/2 rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                                                               required>
                                                    </div>
                                                </div>


                                                <div class="flex flex-col p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                                    <label for="observacoes">Observação:</label>
                                                    <x-quill-editor id="observacoes" name="observacoes"></x-quill-editor>
                                                </div>

                                                <div class="flex items-center justify-between">
                                                    <div class=" p-4 rounded overflow-hidden">
                                                        <input type="submit" value="Agendar"
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

                        <script>
                            $(document).ready(function() {
                                $('#cliente').autocomplete({
                                    source: function(request, response) {
                                        $.ajax({
                                            url: '{{ route("clientes.buscar") }}',
                                            data: {
                                                q: request.term // Valor digitado no input
                                            },
                                            success: function(data) {
                                                response($.map(data, function(cliente) {
                                                    return {
                                                        label: cliente.nome, // Texto exibido na lista
                                                        value: cliente.nome, // Texto inserido no input
                                                        id: cliente.id       // ID do cliente (armazenado no campo oculto)
                                                    };
                                                }));
                                            }
                                        });
                                    },
                                    select: function(event, ui) {
                                        $('#cliente_id').val(ui.item.id); // Armazena o ID do cliente no campo oculto
                                    }
                                });
                            });
                        </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
