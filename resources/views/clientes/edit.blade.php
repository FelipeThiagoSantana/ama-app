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
                    <form action="{{ route('cliente.update', $cliente->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <fieldset class="border-2 rounded p-6">
                            <legend> Editar dados do Paciente</legend>

                            <input class=" rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm" type="hidden"
                                   name="user_id" value="{{Auth::user()->id}}">

                            <div class="mt-4">
                                <div
                                    class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                    <label for="name">Nome Completo</label>
                                    <input type="text" name="nome" id="name"
                                           value="{{$cliente->nome}}"
                                           class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                <label for="sexo">Sexo</label>
                                <select name="sexo" id="sexo"
                                        class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800" required autofocus>
                                    <option value="">Selecione</option>
                                    <option value="Masculino" {{ old('sexo', $cliente->sexo ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Feminino" {{ old('sexo', $cliente->sexo ?? '') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                    <option value="Outro" {{ old('sexo', $cliente->sexo ?? '') == 'Outro' ? 'selected' : '' }}>Outro</option>
                                </select>
                            </div>

                            <div class=" p-4 rounded overflow-hidden">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                       value="{{$cliente->email}}"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                            </div>

                            <div class=" p-4 rounded overflow-hidden">
                                <label for="email">CPF</label>
                                <input type="number" name="cpf" id="cpf"
                                       value="{{$cliente->cpf}}"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm">
                            </div>

                            <div class=" p-4 rounded overflow-hidden">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="telefone"
                                       value="{{$cliente->telefone}}"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                            </div>




                            <div class="p-4 rounded overflow-hidden">
                                <label for="status" class="block text-gray-700 dark:text-gray-200">Status</label>
                                <select name="status" id="status"
                                        class="w-full rounded dark:bg-gray-800 shadow-sm border border-gray-300 dark:border-gray-700 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                        required>
                                    <option value="" disabled selected>Selecione o status</option>
                                    <option value="1" {{ $cliente->status == 1 ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ $cliente->status == 0 ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>
                            <div class=" p-4 rounded overflow-hidden">
                                <label for="dataNascimento">Data de Nascimento</label>
                                <input type="date" value="{{$cliente->dataNascimento}}" name="dataNascimento"
                                       id="dataNascimento"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                                </input>
                            </div>

                                <div class="flex items-center justify-between mt-4">
                                    <x-default-button class="bg-green-700 hover:bg-green-500">
                                        <i class="fa-solid fa-floppy-disk m-1"></i>
                                        {{ __('Salvar Alterações') }}
                                    </x-default-button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                            <fieldset class="border-2 rounded p-6">
                                <legend> Excluir do Paciente</legend>
                                <strong>*Atenção Esse é uma ação permanente*<br></strong>
                                  <p> Ao excluir usuário, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir o paciente, baixe quaisquer dados ou informações que você deseja salvar.</p>
                                <x-default-button class="bg-red-700 hover:bg-red-500 mt-4" onclick="openModal()">
                                    <i class="fa-solid fa-trash m-1"></i>
                                    {{ __('Excluir Paciente') }}
                                </x-default-button>

                                <!-- Modal -->
                                <div id="deleteModal" class="fixed inset-0 bg-gradient-to-tr overflow-hidden shadow-sm sm:rounded-lg flex items-center justify-center hidden">
                                    <div class="bg-white dark:bg-gray-700 overflow-hidden rounded-lg shadow-lg p-6 w-1/3">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <h2 class="text-lg font-bold mb-4">Tem certeza que deseja deletar este o paciente *{{$cliente->nome}}*?</h2>
                                        <p class="mb-6">Esta ação não pode ser desfeita.</p>
                                        </div>

                                        <!-- Formulário para deletar o cliente -->
                                        <form method="POST" action="{{ route('cliente.destroy', $cliente->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <div class="flex justify-end space-x-4">
                                                <!-- Botão Cancelar -->
                                                <button
                                                    type="button"
                                                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700"
                                                    onclick="closeModal()">
                                                    Cancelar
                                                </button>

                                                <!-- Botão Confirmar -->
                                                <button
                                                    type="submit"
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                                    Confirmar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>


</x-app-layout>
