<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atendimento;

class AtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atendimento::create([
            'cliente_id' => 1,
            'user_id' => 1,
            'status' => 'agendado',
            'valor_atendimento' => 100000,
            'tipo_atendimento' => 'online',
            'observacoes' => '<p>TESTE</p>',
            'data_atendimento' => '2025-02-18',
            'frequencia_atendimento' => 'semanal',
            'hora_inicio' => '10:02',
            'hora_fim' => '10:03',
        ]);

        Atendimento::create([
            'cliente_id' => 1,
            'user_id' => 1,
            'status' => 'concluído',
            'valor_atendimento' => 150000,
            'tipo_atendimento' => 'presencial',
            'observacoes' => '<p>TESTE 2</p>',
            'data_atendimento' => '2025-02-19',
            'frequencia_atendimento' => 'mensal',
            'hora_inicio' => '11:00',
            'hora_fim' => '12:00',
        ]);

        Atendimento::create([
            'cliente_id' => 1,
            'user_id' => 1,
            'status' => 'cancelado',
            'valor_atendimento' => 200000,
            'tipo_atendimento' => 'online',
            'observacoes' => '<p>TESTE 3</p>',
            'data_atendimento' => '2025-02-20',
            'frequencia_atendimento' => 'diário',
            'hora_inicio' => '09:00',
            'hora_fim' => '10:00',
        ]);
    }
}
