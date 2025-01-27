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


        $totalDeCliente = Cliente::where('status', '1')->count();
        $totalAgendamento = Atendimento::where('status', 'agendado')->count();

        //Atendimento Online
        $totalAgendamentoOnline = Atendimento::where('status', 'agendado')
            ->where('tipo_atendimento', 'online')->count();
        //AtendimentoPresencial
        $totalAgendamentoPresencial = Atendimento::where('status', 'agendado')
            ->where('tipo_atendimento', 'presencial')->count();

        $totalAtendimentoConfirmado = Atendimento::where('status', 'confirmado')->count();

        $inicioDoMesPassado = Carbon::now()->subMonth()->startOfMonth();
        $fimDoMesPassado = Carbon::now()->subMonth()->endOfMonth();
        $totalAtendimentosUltimoMes = Atendimento::whereBetween('created_at', [$inicioDoMesPassado, $fimDoMesPassado])
            ->where('status', 'concluído')->count();

        $inicioDoMesAtual = Carbon::now()->startOfMonth();
        $fimDoMesAtual = Carbon::now()->endOfMonth();
        $totalAtendimentosMesAtual = Atendimento::whereBetween('created_at', [$inicioDoMesAtual, $fimDoMesAtual])
            ->where('status', 'concluído')->count();


        return view('dashboard', compact('totalDeCliente', 'totalAgendamento', 'totalAgendamentoOnline', 'totalAgendamentoPresencial', 'totalAtendimentosUltimoMes', 'totalAtendimentosMesAtual', 'totalAtendimentoConfirmado' ));
    }
}
