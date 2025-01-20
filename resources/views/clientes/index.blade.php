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


                    <x-blue-button>
                        <i class="fa-solid fa-user-plus m-1"></i>
                        <a href="cliente/create">
                            {{ __('Cadastrar Paciente') }}
                        </a>
                    </x-blue-button>
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
                            @foreach($clientes as $cliente)
                            <tr class="hover:bg-gray-500 text-gray-800 dark:text-gray-200 leading-tight">
                                <td class="p-2">{{$cliente->nome}}</td>
                                <td class="p-2">{{$cliente->email}}</td>
                                <td class="p-2">{{$cliente->telefone}}</td>
                                <td><a href="{{route('cliente.show', $cliente->id)}}">Detalhes</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 mx-4 text-gray-800 dark:text-gray-200 leading-tight rounded-lg">
                        {{$clientes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
