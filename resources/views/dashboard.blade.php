<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid flex-wrap grid-cols-1 md:grid-cols-4 gap-8 max-w-8xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white my-8 dark:bg-gray-800 shadow-md rounded-lg p-2 flex items-center ">
            <div class="bg-cyan-500 text-white rounded-full p-4">
                <i  class=" fa-solid fa-user fa-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class=" font-semibold text-gray-800 dark:text-gray-200">Total de Pacientes</h2>
                <p class="text-4xl text-center font-bold text-cyan-500 mt-2">{{ $totalDeCliente }}</p>
            </div>
        </div>


        <div class="bg-white my-8 dark:bg-gray-800 shadow-md rounded-lg p-4 flex items-center">
            <div class="bg-teal-500 text-white rounded-full p-4">
                <i class="fa-solid fa-check fa-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class=" font-semibold text-gray-800 dark:text-gray-200">Atendimentos Realizados</h2>
                <p class="text-4xl  text-center font-bold text-teal-500 mt-2">{{ $totalAtendimentosMesAtual }}</p>
            </div>
        </div>

        <div class="bg-white my-8 dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center">
            <div class="bg-purple-500 text-white rounded-full p-4">
                <i class="fa-solid fa-earth-americas fa-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200">Total de Atendimentos Online</h2>
                <p class="text-4xl text-center font-bold text-purple-500 mt-2">{{ $totalAgendamentoOnline }}</p>
            </div>
        </div>

        <div class="bg-white my-8 dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center">
            <div class="bg-orange-500 text-white rounded-full p-4">
                <i class="fa-solid fa-location-dot fa-2xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200">Total de Atendimentos Presencial</h2>
                <p class="text-4xl text-center font-bold text-orange-500 mt-2">{{ $totalAgendamentoPresencial }}</p>
            </div>
        </div>
    </div>

    <div class="grid flex-wrap grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white m-8 dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center ">
            <div class="bg-yellow-500 text-white rounded-full p-4">
                <i class="fa-solid fa-calendar-days fa-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl text-center  font-semibold text-gray-800 dark:text-gray-200">Atendimento Agendados</h2>
                <p class="text-4xl text-center font-bold text-yellow-500 mt-2">{{ $totalAgendamento }}</p>
            </div>
        </div>


        <div class="bg-white m-8 dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center">
            <div class="bg-green-600 text-white rounded-full p-4">
                <i class="fa-solid fa-calendar-check fa-xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Atendimentos Confirmados</h2>
                <p class="text-4xl text-center font-bold text-green-600 mt-2">{{ $totalAtendimentoConfirmado }}</p>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-blue-button>
                        <i class="fa-solid fa-notes-medical"></i>
                        Novo Atendimento
                    </x-blue-button>
                    <div>
                        <x-calendar>

                        </x-calendar>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
