<?php

namespace App\Http\Controllers;

use App\Models\Evolucao;
use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\Cliente;


class EvolucaoController extends Controller
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
    public function create(Cliente $cliente, Atendimento $atendimento)
    {

        // As variáveis $cliente e $atendimento já possuem os modelos associados.
        return view('evolucao.create', compact('cliente', 'atendimento'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $cliente_id, $atendimento_id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'evolucao' => 'string',
            'cliente_id' => 'exists:clientes,id',
            'atendimento_id' => 'exists:atendimentos,id',
        ]);

        // Criando a evolução
        Evolucao::create([
            'evolucao' => $validated['evolucao'],
            'cliente_id' => $cliente_id,
            'atendimento_id' => $atendimento_id,
        ]);

        return redirect()->route('atendimento.show', $atendimento_id)->with('msg', 'Evolução salva com sucesso!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Evolucao $evolucao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evolucao $evolucao)
    {
        $cliente = $evolucao->cliente;
        $atendimento = $evolucao->atendimento;

        return view('evolucao.edit',  compact('evolucao', 'cliente', 'atendimento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evolucao $evolucao, Atendimento $atendimento)
    {
        $evolucao ->update($request->all());

        return view('evolucao.edit',  compact('evolucao', 'atendimento')
        ) ->with('msg', 'Evolução atualizada com sucesso!');

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evolucao $evolucao)
    {
        //
    }
}
