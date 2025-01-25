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
              <form action="{{ route('atendimento.update', ['atendimento' => $atendimento->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <fieldset class="border-2 rounded p-6">
                            <legend> Editando Atendimento </legend>
                            <strong>{{$atendimento->nome}}</strong>
                            <input class=" rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm" type="hidden"
                                   name="user_id" value="{{Auth::user()->id}}">

                                <x-atendimento-form  :atendimento="$atendimento">
                                </x-atendimento-form>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
