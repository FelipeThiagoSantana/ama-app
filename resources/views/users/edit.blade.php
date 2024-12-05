<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição de Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Editando Usuário:  {{$user ->name}}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{route('user.update', $user->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <lable for="level" class="text-white">Selecione o nivel</lable>
                            <br>
                            <select name="level" required class="py-1 px-8 rounded">
                                <option value="" selected disabled>Selecione uma opção</option>
                                <option value="user">Usuário</option>
                                <option value="admin">Administrador</option>
                                <option value="bloq">Bloqueado</option>
                            </select>
                            <br>
                            <button type="submit" class="h-10 mt-4 px-6 font-semibold rounded-md bg-blue-700 text-white">
                                <i class="fa-solid fa-floppy-disk mr-2"></i>
                                Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
