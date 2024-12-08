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
                <table class="table-auto w-full">
                    <thead class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                    <tr>
                        <th class="text-center p-2">Nivel</th>
                        <th class="p-2">Nome</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Data de Cadastro</th>
                        @can('level')
                        <th>Ações</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-500 text-gray-800 dark:text-gray-200 leading-tight">
                            <td class="text-center">@if($user->level == 'admin')
                                    <i class="fa-solid fa-gear"></i>
                                @else
                                    <i class="fa-solid fa-user"></i>
                                @endif
                            </td>
                            <td class="text-center p-2">{{$user->name}}</td>
                            <td class="text-center p-2">{{$user->email}}</td>
                            <td class="text-center p-2">{{$user->created_at}}</td>
                            @can('level')
                            <td class="text-center p-2">
                                <a href="{{route('user.edit', $user->id)}}" class="href">Editar</a>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class=" mb-4  mt-4 mx-4 text-gray-800 dark:text-gray-200 leading-tight rounded-lg">
                    {{$users->links()}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
