<?php
namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('atendimento.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recupera as opções de status (se aplicável)
        $statusOptions = Atendimento::getStatusOptions();
        return view('atendimento.create', compact('statusOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os campos do formulário
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data_atendimento' => 'required|date',
            'valor_atendimento' => 'required|numeric|min:0',
            'tipo_atendimento' => 'nullable|string|max:255',
            'observacao' => 'nullable|string',
        ]);

        // Busca o cliente pertencente ao usuário autenticado
        $cliente = Cliente::where('id', $request->cliente_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Cria o atendimento
        Atendimento::create([
            'cliente_id' => $cliente->id,
            'user_id' => auth()->id(),
            'status' => 'agendado',
            'frequencia_atendimento' => $request->frequencia_atendimento,
            'valor_atendimento' => $request->valor_atendimento,
            'tipo_atendimento' => $request->tipo_atendimento,
            'data_atendimento' => $request->data_atendimento,
            'observacoes' => $request->observacoes,
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('atendimento.index')->with('success', 'Atendimento criado com sucesso.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atendimento $atendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento)
    {
        //
    }

}

