<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Financeiro;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Captura as datas do request, se não houver valores, define um padrão
        $dataInicio = $request->input('data_inicio', Carbon::now()->subDays(30)->format('Y-m-d'));
        $dataFim = $request->input('data_fim', Carbon::now()->format('Y-m-d'));

        // Converte para objetos Carbon para garantir compatibilidade com a consulta
        $dataInicio = Carbon::parse($dataInicio)->startOfDay();
        $dataFim = Carbon::parse($dataFim)->endOfDay();

        // Filtra os registros baseados nas datas escolhidas
        $financeiros = Financeiro::where('user_id', auth()->id())
            ->whereBetween('created_at', [$dataInicio, $dataFim])
            ->with('atendimento', 'cliente')
            ->orderByDesc('created_at')
            ->get();

        $atendimentosRecebidos = Financeiro::where('user_id', auth()->id())
            ->where('status_pagamento', 'pago')
            ->whereBetween('created_at', [$dataInicio, $dataFim])
            ->count();

        $atendimentosPendentes = Financeiro::where('user_id', auth()->id())
            ->where('status_pagamento', 'pendente')
            ->whereBetween('created_at', [$dataInicio, $dataFim])
            ->count();

        $totalRecebido = Financeiro::where('user_id', auth()->id())
            ->where('status_pagamento', 'pago')
            ->whereBetween('created_at', [$dataInicio, $dataFim])
            ->sum('valor_atendimento');

        $totalAReceber = Financeiro::where('user_id', auth()->id())
            ->where('status_pagamento', 'pendente')
            ->whereBetween('created_at', [$dataInicio, $dataFim])
            ->sum('valor_atendimento');

        return view('financeiro.index', compact(
            'financeiros', 'atendimentosPendentes', 'atendimentosRecebidos',
            'totalRecebido', 'totalAReceber', 'dataInicio', 'dataFim'
        ));
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
