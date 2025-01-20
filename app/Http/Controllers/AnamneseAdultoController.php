<?php

namespace App\Http\Controllers;

use App\Models\anamnese_adulto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AnamneseAdultoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cliente $cliente)
    {
        $anamnese = $cliente->customers()->first(); // Verifica se existe uma anamnese associada
        return view('anamnese-adulto.create', [
            'cliente' => $cliente,
            'anamnese' => $anamnese
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $clienteId)
    {
        // Recupere o cliente pelo ID
        $cliente = Cliente::find($clienteId);

        // Verifique se o cliente existe
        if (!$cliente) {
            return redirect()->back()->withErrors('Cliente não encontrado.');
        }

        $anamnese = new anamnese_adulto();

        $anamnese->cliente_id = $cliente->id;
        $anamnese->nome = $request->input('nome', $cliente->nome);
        $anamnese->sexo = $request->input('sexo', $cliente->sexo);
        $anamnese->dataNascimento = $request->input('dataNascimento', $cliente->dataNascimento);
        $anamnese->escolaridade = $request->input('escolaridade', '');
        $anamnese->profissao = $request->input('profissao', '');
        $anamnese->religiao = $request->input('religiao', '');
        $anamnese->estadoCivil = $request->input('estadoCivil', '');
        $anamnese->queixa = $request->input('queixa', '');
        $anamnese->conjuge = $request->input('conjuge', '');
        $anamnese->filhos = $request->input('filhos', '');
        $anamnese->constituicaoFamiliar = $request->input('constituicaoFamiliar', '');
        $anamnese->relacaoComFamiliares = $request->input('relacaoComFamiliares', '');
        $anamnese->historiaPatologicaPregressa = $request->input('historiaPatologicaPregressa', '');
        $anamnese->alimentacao = $request->input('alimentacao', '');
        $anamnese->sono = $request->input('sono', '');
        $anamnese->historiaSaudeAtual = $request->input('historiaSaudeAtual', '');
        $anamnese->medicacao = $request->input('medicacao', '');
        $anamnese->rotina = $request->input('rotina', '');
        $anamnese->observacao = $request->input('observacao', '');


        // Salve a anamnese no banco de dados
        $anamnese->save();

        // Redirecione ou retorne uma mensagem de sucesso
        return redirect()->route('cliente.show',  $cliente->id)->with('msg', 'Anamnese criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(anamnese_adulto $anamnese_adulto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(anamnese_adulto $anamnese)
    {
        // Obtém o cliente relacionado à anamnese
        $cliente = $anamnese->cliente;

        // Retorna a view com ambos os objetos
        return view('anamnese-adulto.edit', compact('anamnese', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente, anamnese_adulto $anamnese)
    {
        // Validação e atualização dos dados
        $anamnese->update($request->all());

        // Redirecionar para a rota correta
        return redirect()->route('cliente.show', ['cliente' => $cliente->id])
            ->with('success', 'Anamnese atualizada com sucesso!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(anamnese_adulto $anamnese_adulto)
    {
        //
    }
}
