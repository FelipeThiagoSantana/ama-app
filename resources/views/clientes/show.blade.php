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
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Identificação do Paciente </h2>
                    <hr class="m-5">
                    <strong class="text-gray-900 dark:text-gray-100 m-4">Nome:</strong> {{$cliente->nome}}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 m-4">Sexo:</strong> {{ $cliente->sexo ?? '  ' }}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 m-4">Email:</strong> {{$cliente->email}}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 m-4">CPF:</strong> {{$cliente->cpf}}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 m-4">Telefone:</strong> {{$cliente->telefone}}
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 m-4">Status:</strong>
                    @if($cliente->status == 1)
                        Ativo
                    @else
                        Inativo
                    @endif
                    <br>
                    <strong class="text-gray-900 dark:text-gray-100 m-4">Data de Nascimento:</strong>
                    {{ \Carbon\Carbon::parse($cliente->dataNascimento)->format('d/m/Y') }}
                    <div class="mt-4">
                        <a href="{{route('cliente.edit', $cliente->id)}}">
                        <x-default-button class="bg-orange-500 hover:bg-orange-400">
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('Editar') }}
                        </x-default-button>
                        </a>
                    </div>
                </div>
            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Anamnese</h2>
                    <hr class="m-5">
                    <div class="flex items-center justify-between flex-wrap">
                        @if($cliente->anamnese)
                            <x-default-button class="bg-blue-600 hover:bg-blue-500 mt-4 mb-4">
                                <a href="{{ route('anamnese-adulto.edit', $cliente->anamnese->id) }}"
                                   class="btn btn-primary">
                                    <i class="fa-solid fa-clipboard p-1"></i>
                                    EDITAR ANAMNESE
                                </a>
                            </x-default-button>
                        @else
                            <x-default-button class="bg-blue-600 hover:bg-blue-500 mt-4 mb-4">
                                <a href="{{ route('anamnese-adulto.create', ['cliente' => $cliente->id]) }}"
                                   class="btn btn-primary">
                                    <i class="fa-regular fa-clipboard p-1"></i>
                                    CRIAR ANAMNESE
                                </a>
                            </x-default-button>
                        @endif
                        <x-default-button class="bg-purple-500 hover:bg-purple-400 mt-4 mb-4">
                            <i class="fa-solid fa-print m-1"></i>
                            IMPRIMIR
                        </x-default-button>
                    </div>


                    <fieldset class="border-2 rounded p-6 mb-4">
                        <legend><h1> PACIENTE </h1></legend>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">Nome:</strong> {{$cliente->nome}}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">Sexo:</strong> {{ $cliente->sexo ?? '  ' }}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">Email:</strong> {{$cliente->email}}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">CPF:</strong> {{$cliente->cpf ?? '  '}}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">Telefone:</strong> {{$cliente-> telefone ?? '  '}}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">Idade:</strong>
                        {{ $cliente->dataNascimento ? \Carbon\Carbon::parse($cliente->dataNascimento)->age : 'Não informada' }}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">Escolaridade:</strong> {{$anamnese->  escolaridade ?? '  '}}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4">Profissão:</strong>  {{$anamnese-> proficao ?? '  '}}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4"> Religião:</strong>  {{$anamnese->religiao  ?? '  '}}
                        <br>
                        <strong class="text-gray-900 dark:text-gray-100 m-4"> Estado Civil:</strong> {{$anamnese->estadoCivil ?? '  '}}
                        <br>
                    </fieldset>

                    <fieldset class="border-2 rounded p-6 mb-4">
                        <legend><h1> QUEIXA </h1></legend>
                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Queixa: (Há quanto tempo, algum motivo aparente):</strong>
                            <p>{!! $anamnese->queixa ?? ' ' !!} </p>
                        </div>
                    </fieldset>

                    <fieldset class="border-2 rounded p-6 mb-4">
                        <legend><h1> DADOS FAMILIARES </h1></legend>
                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong> Cônjuge (nome idade e profissão):</strong>
                            <p>{!! $anamnese->conjuge ?? ' ' !!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Filhos(nome, idade e sexo):</strong>
                            <p>{!! $anamnese->filhos  ?? ' '!!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Constituição Familiar(residentes):</strong>
                            <p>{!! $anamnese->constituicaoFamiliar ?? ' ' !!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Relacionamento com familiares:</strong>
                            <p>{!! $anamnese->relacaoComFamiliares ?? ' ' !!} </p>
                        </div>
                    </fieldset>

                    <fieldset class="border-2 rounded p-6 mb-4">
                        <legend><h1> HISTORICO DO PACIENTE </h1></legend>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>História patológica pregressa (enfermidades e tratamentos atuais e anteriores):
                            </strong>
                            <p>{!! $anamnese->historiaPatologicaPregressa ?? '  ' !!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Alimentação:
                            </strong>
                            <p>{!! $anamnese->alimentacao ?? '  ' !!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Sono:
                            </strong>
                            <p>{!! $anamnese->sono ?? '  ' !!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>História da Saúde atual (diagnóstico e sintomas):
                            </strong>
                            <p>{!! $anamnese->historiaSaudeAtual ?? '  ' !!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Medicação:
                            </strong>
                            <p>{!! $anamnese->medicacao ?? '  ' !!} </p>
                        </div>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Rotina (durante a semana e aos finais de semana):
                            </strong>
                            <p>{!! $anamnese->rotina ?? '  '!!} </p>
                        </div>

                    </fieldset>

                    <fieldset class="border-2 rounded p-6 mb-4">
                        <legend><h1> OBSERVAÇÃO </h1></legend>

                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <strong>Dados Extras:
                            </strong>
                            <p>{!! $anamnese->observacao ?? '  '!!} </p>
                        </div>

                    </fieldset>



                        @if($anamnese)
                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <div class="flex items-center justify-between flex-wrap font-light">
                                <div>
                                    <strong>Criado em:</strong>
                                    <p>{{$anamnese->created_at->format('d/m/Y') ?? ' '}}</p>
                                </div>
                                <div>
                                    <strong>Última edição:</strong>
                                    <p>{{$anamnese->updated_at->format('d/m/Y') ?? ' '}}</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="text-gray-900 dark:text-gray-100 m-4">
                            <div class="flex items-center justify-between flex-wrap font-light">
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
