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
                                                <x-atendimento-form  :atendimento="$atendimento">

                                                </x-atendimento-form>
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
