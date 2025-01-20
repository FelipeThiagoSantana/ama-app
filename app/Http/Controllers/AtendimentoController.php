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
        // Retorna a view para exibição dos atendimentos
        $atendimentos = Atendimento::where('user_id', auth()->id())
            ->orderBy('data_atendimento', 'asc')
            ->with('cliente')
            ->get();

        return view('atendimento.index', compact('atendimentos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recupera as opções de status (se aplicável)
        $statusOptions = Atendimento::getStatusOptions();
        $atendimento = new Atendimento();
        return view('atendimento.create', compact('statusOptions', 'atendimento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os campos do formulário
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'status'=>'required',
            'valor_atendimento'=>'required|numeric|min:0',
            'data_atendimento' => 'required|date',
            'hora_inicio'=> 'required',
            'hora_fim'=> 'required',
            'tipo_atendimento' => 'nullable|string|max:255',
            'frequencia_atendimento' => 'nullable|string|max:255',
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
            'valor_atendimento' => $request->valor_atendimento,
            'data_atendimento' => $request->data_atendimento,
            'hora_inicio' => $request->hora_inicio,
            'hora_fim' => $request->hora_fim,
            'tipo_atendimento' => $request->tipo_atendimento,
            'frequencia_atendimento' => $request->frequencia_atendimento,
            'observacoes' => $request->observacoes
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('atendimento.index')->with('success', 'Atendimento criado com sucesso.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento)
    {
    //Verifica se o usuario está aturenticado e se aquele atendimento o pertence
     if($atendimento->user_id !== auth()->id()){
         abort(403, 'Você Não tem permissão para acessar esse atendimento!');
     }
        $atendimentos = Atendimento::where('user_id', auth()->id())
        ->with('cliente')->get();
        $nroAtendimento = Atendimento::where('cliente_id', $atendimento->cliente_id)->count();
        return view('atendimento.show', compact('atendimento', 'nroAtendimento'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento)
    {
        // Certifique-se de carregar o relacionamento 'cliente' do atendimento
        $atendimento->load('cliente');

        // Contar o número de atendimentos do cliente específico
        $nroAtendimento = Atendimento::where('cliente_id', $atendimento->cliente_id)->count();

        // Retornar a view com as informações necessárias
        return view('atendimento.edit', compact('atendimento', 'nroAtendimento'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atendimento $atendimento)
    {
        $atendimento ->update($request->all());
        $atendimentos = Atendimento::where('user_id', auth()->id())
            ->with('cliente')->get();
        $nroAtendimento = Atendimento::where('cliente_id', $atendimento->cliente_id)->count();
        return view('atendimento.show', compact('atendimento', 'nroAtendimento'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento)
    {
        //
    }

    //Função para retornar um json para ser consulmida pela api do FullCalendar.
    public function calendar()
    {
        $atendimentos = Atendimento::where('user_id', auth()->id())
            ->get()
            ->map(function ($atendimento) {
            return [
                'id' => $atendimento->id,
                'title' => $atendimento->cliente->nome,
                'start' => $atendimento->data_atendimento . 'T' . $atendimento->hora_inicio,
                'end' => $atendimento->data_atendimento . 'T' . $atendimento->hora_fim,
            ];
        });

        return response()->json($atendimentos);
    }}





