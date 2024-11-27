<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{ __('Lista de Usuários') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <p class="mb-4">Olá <strong>{{Auth::user()->name}}</strong></p>
            </div>

            <div class="p-6 text-gray-900">
                <table class="table-auto w-full">
                    <thead class="text-left bg-gray-800">
                        <tr>
                            <th class="text-center">Nivel</th>
                            <th class="p-2">Nome</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Data de Cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
