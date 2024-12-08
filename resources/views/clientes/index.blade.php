<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Olá <strong>{{Auth::user()->name }}</strong></p>


                    <div class="flex items-center justify-between">
                        <a href="{{route('paciente.create')}}" class="hover:bg-blue-400 group flex items-center rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm">
                            <svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
                                <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                            </svg>
                            Cadastrar Paciente
                        </a>
                    </div>
                    <div class="p-6 text-gray-900">
                        <table class="table-auto w-full">
                            <thead class="text-gray-100 sm:text-left">
                            <tr>
                                <th class="p-2">Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente) @endforeach
                            <tr class="hover:bg-gray-500 text-gray-800 dark:text-gray-200 leading-tight">
                                <td class="p-2">{{$cliente->nome}}</td>
                                <td class="p-2">{{$cliente->email}}</td>
                                <td class="p-2">{{$cliente->telefone}}</td>
                                <td>Editar</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="gray-500 rounded p-2 mb-4">
                        {{$cliente->link}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
