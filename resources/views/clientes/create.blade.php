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
                    <p class="mb-4">Olá <strong>{{Auth::user()->name }}</strong></p>
                    @if(session('msg'))
                        <p class="bg-blue-500 p2 rounded text-center text-white mb4">
                            {{session('msg')}}
                        </p>

                    @endif
                    <form action="{{ route('paciente.store') }}" method="post">
                        @csrf
                        <fieldset class="border-2 rounded p-6">
                            <legend> Cadastrar Paciente</legend>

                            <input class=" rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm" type="hidden"
                                   name="user_id" value="{{Auth::user()->id}}">

                            <div class="mt-4">
                                <div
                                    class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
                                    <label for="name">Nome</label>
                                    <input type="text" name="nome" id="name"
                                           class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                                           required autofocus>
                                </div>
                            </div>

                            <div class=" p-4 rounded overflow-hidden">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                            </div>

                            <div class=" p-4 rounded overflow-hidden">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="telefone"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                            </div>

                            <div class=" p-4 rounded overflow-hidden">
                                <label for="dataNascimento">Data de Nascimento</label>
                                <input type="date" name="dataNascimento" id="dataNascimento"
                                       class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm" required>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class=" p-4 rounded overflow-hidden">
                                    <input type="submit" value="Cadastrar"
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
</x-app-layout>
