<?php

namespace App\Http\Controllers;
use App\Models\Atendimento;
use App\Models\Cliente;
use App\Models\Dashboard;
use App\Models\Financeiro;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Filtra os atendimentos
        $totalDeCliente = Cliente::where('user_id', auth()->id())
        ->where('status', '1')->count();


        $totalAgendamento = Atendimento::where('user_id', auth()->id())->where('status', 'agendado')->count();

        // Atendimentos Online
        $totalAgendamentoOnline = Atendimento::where('user_id', auth()->id())
            ->where('status', 'agendado')
            ->where('tipo_atendimento', 'online')->count();

        // Atendimentos presenciais do usuário
        $totalAgendamentoPresencial = Atendimento::where('user_id', auth()->id())
            ->where('status', 'agendado')
            ->where('tipo_atendimento', 'presencial')->count();

        // Total de atendimentos confirmados
        $totalAtendimentoConfirmado = Atendimento::where('user_id', auth()->id())
            ->where('status', 'confirmado')->count();

        // Atendimentos  no último mês
        $inicioDoMesPassado = Carbon::now()->subMonth()->startOfMonth();
        $fimDoMesPassado = Carbon::now()->subMonth()->endOfMonth();
        $totalAtendimentosUltimoMes = Atendimento::where('user_id', auth()->id())
            ->whereBetween('created_at', [$inicioDoMesPassado, $fimDoMesPassado])
            ->where('status', 'concluído')->count();

        // Atendimentos
        $inicioDoMesAtual = Carbon::now()->startOfMonth();
        $fimDoMesAtual = Carbon::now()->endOfMonth();
        $totalAtendimentosMesAtual = Atendimento::where('user_id', auth()->id())
            ->whereBetween('created_at', [$inicioDoMesAtual, $fimDoMesAtual])
            ->where('status', 'concluído')->count();

        // Passando os dados filtrados para a view
        return view('dashboard', compact(
            'totalDeCliente',
            'totalAgendamento',
            'totalAgendamentoOnline',
            'totalAgendamentoPresencial',
            'totalAtendimentosUltimoMes',
            'totalAtendimentosMesAtual',
            'totalAtendimentoConfirmado'
        ));
    }

}
