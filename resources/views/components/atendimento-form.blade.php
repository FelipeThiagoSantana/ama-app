<div>
    <input class=" rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm" type="hidden"
           name="user_id" value="{{Auth::user()->id}}">

    <div class="mt-4">
        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="cliente">Buscar Paciente:</label>
            <input type="text" name="cliente_nome" id="cliente"
                   class="w-full rounded bg-white dark:bg-gray-800 shadow-sm"
                   required autofocus
                   value="{{ $atendimento->cliente->nome ?? old('cliente_nome') }}">
            <input type="hidden" id="cliente_id" name="cliente_id"
                   value="{{ $atendimento->cliente_id ?? old('cliente_id') }}">
            @error('cliente_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
        <label for="status">Status do Atendimento:</label>
        <select name="status" id="status"
                class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800" required autofocus value="{{$atendimento->status ?? ''}}">
            <option >Selecione</option>
            <option
                value="agendado" {{ isset($atendimento) && $atendimento->status == 'agendado' ? 'selected' : '' }}>
                Agendado
            </option>
            <option
                value="confirmado" {{ isset($atendimento) && $atendimento->status == 'confirmado' ? 'selected' : '' }}>
                Confirmado
            </option>
            <option
                value="cancelado"  {{ isset($atendimento) && $atendimento->status == 'cancelado' ? 'selected' : '' }}>
                Cancelado
            </option>
            <option
                value="finalizado"  {{ isset($atendimento) && $atendimento->status == 'finalizado' ? 'selected' : '' }}>
                Finalizado
            </option>
            <option
                value="reagendado"  {{ isset($atendimento) && $atendimento->status == 'reagendado' ? 'selected' : '' }}>
                Reagendado
            </option>
        </select>
    </div>

    <div class="p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
        <label for="frequencia_atendimento">Frequencia do Atendimento:</label>
        <select name="frequencia_atendimento" id="frequencia_atendimento"
                class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                autofocus value="{{$atendimento->tipo_atendimento ?? ''}}">
            <option value="">Selecione</option>
            <option
                value="semanal"  {{ isset($atendimento) && $atendimento->frequencia_atendimento == 'semanal' ? 'selected' : '' }}>
                Semanal
            </option>
            <option
                value="quinzenal" {{ isset($atendimento) && $atendimento->frequencia_atendimento == 'quinzenal' ? 'selected' : '' }}>
                Quizenal
            </option>
            <option
                value="mensal" {{ isset($atendimento) && $atendimento->frequencia_atendimento == 'mensal' ? 'selected' : '' }} >
                Mensal
            </option>
        </select>
    </div>

    <div class="flex flex-col p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
        <label for="valor_atendimento">Valor do Atendimento:</label>
        <div class="flex flex-row">
            <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker">R$</span>
            <input type="number" placeholder="0,00" name="valor_atendimento" id="valor_atendimento" class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm"  value="{{$atendimento->valor_atendimento ?? ''}}" required>
        </div>
    </div>

    <div class="p-4 rounded overflow-hidden block mt-1 w-full p-4 rounded overflow-hidden">
        <label for="tipo_atendimento">Tipo de Atendimento:</label>
        <select name="tipo_atendimento" id="tipo_atendimento"
                class="w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                autofocus>
            <option value="">Selecione</option>
            <option
                value="online" {{ isset($atendimento) && $atendimento->tipo_atendimento == 'online' ? 'selected' : '' }}>
                Online
            </option>
            <option
                value="presencial" {{ isset($atendimento) && $atendimento->tipo_atendimento == 'presencial' ? 'selected' : '' }}>
                Presencial
            </option>
            <option
                value="presencialGupo" {{ isset($atendimento) && $atendimento->tipo_atendimento == 'presencialGupo' ? 'selected' : '' }}>
                Presencial em Grupo
            </option>
            <option
                value="onlineGupo" {{ isset($atendimento) && $atendimento->tipo_atendimento == 'onlineGupo' ? 'selected' : '' }}>
                Online em Grupo
            </option>
        </select>
    </div>


    <div class=" p-4 rounded overflow-hidden">
        <label for="data_atendimento">Data de Atendimento</label>
        <input type="date" name="data_atendimento" id="data_atendimento"
               class="w-full rounded  dark:bg-gray-800 overflow-hidden shadow-sm"  value="{{$atendimento->data_atendimento ?? ''}}" required>
    </div>

    <div class="p-4 rounded overflow-hidden block mt-1 w-full flex star  justify-start flex-wrap font-light">
        <div class="flex gap-4  m-1">
            <label for="hora_inicio ">Hora Início:</label>
            <input type="time" name="hora_inicio" id="hora_inicio"
                   class="  w-auto  rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                   required value="{{$atendimento->hora_inicio ?? ''}}">
        </div>

        <div class="flex gap-4 m-1">
            <label for="hora_fim">Hora  Fim:</label>
            <input type="time" name="hora_fim" id="hora_fim"
                   class=" w-auto rounded border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-800"
                   required value="{{$atendimento->hora_fim ?? ''}}">
        </div>
    </div>


    <div class="flex flex-col p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
        <label for="observacoes">Observação:</label>
        <x-quill-editor id="observacoes" name="observacoes" value="{{$atendimento->observacoes ?? ''}}">
        </x-quill-editor>
    </div>

    <div class="flex items-center justify-between">
        <div class=" p-4 rounded overflow-hidden">
            <input type="submit" value="Confirmar"
                   class="hover:bg-blue-400 group flex items-center rounded bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm">
        </div>
       {{-- <div>
            <input type="submit" value="cencelar"
                   class="hover:bg-red-400 group flex items-center rounded bg-red-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm ">
        </div>--}}
    </div>
</div>
