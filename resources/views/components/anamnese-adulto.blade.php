<div>
    <div class="mt-4">


        <div
            class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
            <label for="escolaridade">Escolaridade:</label>
            <input type="text" name="escolaridade" id="escolaridade"
                   class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                   value="{{$anamnese->escolaridade ?? ''}}" autofocus>
        </div>

        <div
            class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
            <label for="name">Profissão:</label>
            <input type="text" name="profissao" id="profissao"
                   class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                   value="{{$anamnese->profissao ?? ''}}" autofocus>
        </div>

        <div
            class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
            <label for="religiao">Religião:</label>
            <input type="text" name="religiao" id="religiao"
                   class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                   value="{{$anamnese->religiao ?? ''}}" autofocus>
        </div>

        <div
            class=" p-4 rounded overflow-hidden  block mt-1 w-full p-4 rounded overflow-hidden">
            <label for="estadoCivil">Estado Civil:</label>
            <input type="text" name="estadoCivil" id="estadoCivil"
                   class="w-full rounded bg-white dark:bg-gray-800 overflow-hidden shadow-sm"
                   value="{{$anamnese->estadoCivil ?? ''}}" autofocus>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="Queixas">Queixas:</label>
            <x-quill-editor id="queixa-editor" name="queixa" value="{{ $anamnese->queixa ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="conjuge">Cônjuge (nome, idade e profissão):</label>
            <x-quill-editor id="conjuge-editor" name="conjuge" value="{{ $anamnese->conjuge ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="filhos">Filhos(nome, idade e sexo):</label>
            <x-quill-editor id="filhos-editor" name="filhos" value="{{ $anamnese->conjuge ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="constituicaoFamiliar">Constituição Familiar(residentes):</label>
            <x-quill-editor id="constituicaoFamiliar" name="constituicaoFamiliar" value="{{ $anamnese->constituicaoFamiliar ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="relacaoComFamiliares">Relacionamento com familiares:</label>
            <x-quill-editor id="relacaoComFamiliares" name="relacaoComFamiliares" value="{{ $anamnese->relacaoComFamiliares ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="historiaPatologicaPregressa">História patológica pregressa (enfermidades e tratamentos atuais e anteriores):
            </label>
            <x-quill-editor id="historiaPatologicaPregressa" name="historiaPatologicaPregressa" value="{{ $anamnese->historiaPatologicaPregressa ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="alimentacao">Alimentação:
            </label>
            <x-quill-editor id="alimentacao" name="alimentacao" value="{{ $anamnese->alimentacao ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="sono">Sono:
            </label>
            <x-quill-editor id="sono" name="sono" value="{{ $anamnese->sono ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="sono">História da Saúde atual (diagnóstico e sintomas):
            </label>
            <x-quill-editor id="historiaSaudeAtual" name="historiaSaudeAtual" value="{{ $anamnese->historiaSaudeAtual ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="medicacao">Medicação:
            </label>
            <x-quill-editor id="medicacao" name="medicacao" value="{{ $anamnese->medicacao ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="rotina">Rotina (durante a semana e aos finais de semana):
            </label>
            <x-quill-editor id="rotina" name="rotina" value="{{ $anamnese->rotina ?? '' }}"></x-quill-editor>
        </div>

        <div class="p-4 rounded overflow-hidden block mt-1 w-full">
            <label for="observacao">Observações
            </label>
            <x-quill-editor id="observacao" name="observacao" value="{{ $anamnese->observacao ?? '' }}"></x-quill-editor>
        </div>
</div>
</div>
