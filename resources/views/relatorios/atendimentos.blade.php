<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Relatório Inovador de Atendimentos</title>
    <style>
        @page {
            margin: 20mm;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            margin: 0;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #4F81BD;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
        }

        .title {
            font-size: 28px;
            color: #4F81BD;
            margin-top: 10px;
        }

        .dashboard {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            gap: 20px;
        }

        .dashboard-content {
            display: flex;
            flex-direction: column;
            width: 60%;
            gap: 10px;
        }

        /* Tabela do dashboard sem as linhas */
        .dashboard-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .dashboard-table th,
        .dashboard-table td {
            padding: 5px;
            border: none;
            text-align: center;
        }

        /* Redefine as larguras das colunas */
        .dashboard-table th:first-child,
        .dashboard-table td:first-child {
            width: 35%;
        }

        .dashboard-table th:last-child,
        .dashboard-table td:last-child {
            width: 65%;
        }

        /* Estilos reduzidos para as boxes e o gráfico */
        .box {
            padding: 5px;
            background: #F2F2F2;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 14px;
        }

        .box h3 {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .box p {
            font-size: 12px;
            font-weight: bold;
            color: #4F81BD;
            margin: 2px 0 0;
        }

        .grafico img {
            height: 60%;
            width: auto;
            max-width: 60%;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .content-table th,
        .content-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            font-size: 12px;
        }

        .content-table th {
            background-color: #EEE;
            text-transform: uppercase;
        }

        .even {
            background-color: #f9f9f9;
        }

        .summary {
            margin-top: 20px;
            padding: 10px;
            border-top: 2px solid #DDD;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            border-top: 1px dashed #888;
            padding-top: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Insira a logo convertida para Base64 ou use o asset via url-->
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/ama.png'))) }}" alt="Logo Ama App">
        <div class="title">Relatório Inovador de Atendimentos</div>
    </div>

    @php
        $totalAtendimentos = count($atendimentos);
        $totalValor = collect($atendimentos)->sum('valor_atendimento');
        $mediaValor = $totalAtendimentos > 0 ? $totalValor / $totalAtendimentos : 0;
        $maxValor = collect($atendimentos)->max('valor_atendimento');
        $minValor = collect($atendimentos)->min('valor_atendimento');
        $totalClientes = collect($atendimentos)->pluck('cliente.id')->unique()->count();
    @endphp

    <table class="dashboard-table">
        <tbody>
            <tr>
                <td>
                    <div class="box">
                        <h3>Total Atendimentos</h3>
                        <p>{{ $totalAtendimentos }}</p>
                    </div>
                </td>
                <!-- Atualizamos o rowspan para 6 linhas -->
                <td rowspan="6">
                    <div class="grafico">
                        <img src="{{ $chart }}" alt="Gráfico de Atendimento">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="box">
                        <h3>Total Faturado</h3>
                        <p>R$ {{ number_format($totalValor, 2, ',', '.') }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="box">
                        <h3>Média por Atendimento</h3>
                        <p>R$ {{ $totalAtendimentos > 0 ? number_format($mediaValor, 2, ',', '.') : '0,00' }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="box">
                        <h3>Maior Valor</h3>
                        <p>R$ {{ $maxValor ? number_format($maxValor, 2, ',', '.') : '0,00' }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="box">
                        <h3>Menor Valor</h3>
                        <p>R$ {{ $minValor ? number_format($minValor, 2, ',', '.') : '0,00' }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="box">
                        <h3>Total de Clientes</h3>
                        <p>{{ $totalClientes }}</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br><br><br>
    <!-- Tabela de detalhes -->
    <table class="content-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Frequência</th>
                <th>Observações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atendimentos as $atendimento)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'even' : '' }}">
                    <td>{{ $atendimento->id }}</td>
                    <td>{{ $atendimento->cliente->nome ?? 'N/A' }}</td>
                    <td>{{ ucfirst($atendimento->status) }}</td>
                    <td>R$ {{ number_format($atendimento->valor_atendimento, 2, ',', '.') }}</td>
                    <td>{{ ucfirst($atendimento->tipo_atendimento) }}</td>
                    <td>{{ \Carbon\Carbon::parse($atendimento->data_atendimento)->format('d/m/Y') }}</td>
                    <td>{{ $atendimento->hora_inicio }}</td>
                    <td>{{ $atendimento->hora_fim }}</td>
                    <td>{{ ucfirst($atendimento->frequencia_atendimento) }}</td>
                    <td>{!! $atendimento->observacoes !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Resumo -->
    <div class="summary">
        Relatório gerado com tecnologia de ponta, exibindo informações de forma clara e revolucionária, integrando dados
        estatísticos com análise visual para auxiliar na tomada de decisão estratégica.
    </div>

    <div class="footer">
        Gerado em {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }} <br>
        Ama App - Relatórios Gerados com Excelência e Inovação
    </div>
</body>

</html>
