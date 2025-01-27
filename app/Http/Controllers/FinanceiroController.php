<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Financeiro;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financeiros = Financeiro::with('atendimento', 'cliente')->orderByDesc('created_at')->get();
        $atendimentosRecebidos = Financeiro::where('status_pagamento', 'pago')->count();
        $atendimentosPendentes = Financeiro::where('status_pagamento', 'pendente')->count();
        $totalRecebido = Financeiro::where('status_pagamento', 'pago')->sum('valor_atendimento');
        $totalAReceber = Financeiro::where('status_pagamento', 'pendente')->sum('valor_atendimento');


        return view ('financeiro.index', compact('financeiros', 'atendimentosPendentes', 'atendimentosRecebidos','totalRecebido', 'totalAReceber' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Financeiro $financeiro)
    {

        $financeiro->load('atendimento', 'cliente');

        return view('financeiro.show', compact('financeiro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Financeiro $financeiro)
    {
        $financeiro->load('atendimento', 'cliente');

        return view('financeiro.edit', compact('financeiro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Financeiro $financeiro)
    {
        $financeiro ->update($request->all());

        return redirect()->route('financeiro.show', $financeiro->id)
            ->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Financeiro $financeiro)
    {
        //
    }

}
