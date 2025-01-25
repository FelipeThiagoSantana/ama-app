<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Evolucao;

class ClienteController extends Controller
{
  /*  public function __construct()
    {
        $this->middleware('can:level')->only('index');
    }*/

    public function meus_clientes(User $id)
    {

        if (auth()->id() !== $id->id) {
            abort(403, 'Acesso não autorizado');
        }
        $user = User::where('id', $id->id)->first();
        $clientes = $user->customers()->get();

        return view ('clientes.meus_clientes',[
           'clientes' => $clientes
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view ('clientes.index',[
        'clientes' => Cliente::orderBy('nome')->paginate('5')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sexo'=> 'required|string|max:10',
            'cpf' => 'nullable|string',
            'telefone' => 'required|string|max:15',
            'dataNascimento' => 'required|date',
        ]);

        Cliente::create($validatedData);
        return redirect()->route('cliente.create')->with('msg', 'Paciente cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente, Atendimento $atendimento)
    {
        // Busca a anamnese associada ao cliente
        $anamnese = $cliente->anamnese;

        $nroAtendimento = Atendimento::where('cliente_id', $atendimento->cliente_id)->count();

        $evolucoes = Evolucao::where('cliente_id', $cliente->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('clientes.show', compact('cliente', 'anamnese','evolucoes', 'nroAtendimento'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
       return view('clientes.edit', ['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        Cliente::findOrFail($cliente->id)->update($request->all());
        return redirect()->route('cliente.show', $cliente->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
       Cliente::findOrFail($cliente->id)->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente excluído com sucesso!');
    }

    //Busca por filtro
    public function buscarClientes(Request $request)
    {
        $query = $request->get('q'); // Parâmetro de busca
        $clientes = Cliente::where('user_id', auth()->id()) // Apenas clientes do usuário autenticado
        ->where('nome', 'LIKE', '%' . $query . '%') // Filtro por nome
        ->get(['id', 'nome']); // Retorne apenas os campos necessários

        return response()->json($clientes); // Retorna os dados em formato JSON
    }

}
