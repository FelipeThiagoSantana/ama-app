<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Atendimento;

class RelatorioController extends Controller
{
    public function gerarRelatorioAtendimentos()
    {
        $atendimentos = Atendimento::all();

        $labels = $atendimentos->pluck('id')->toArray();
        $data = $atendimentos->pluck('valor_atendimento')->toArray();

        $chartData = [
            "type" => 'horizontalBar',
            "data" => [
                "labels" => $labels,
                "datasets" => [
                    [
                        "label" => "Valor do Atendimento",
                        "data" => $data,
                        "backgroundColor" => ['#27ae60', '#f1c40f', '#e74c3c']
                    ],
                ],
            ]
        ];

        $chartData = json_encode($chartData);
        $chartURL = "https://quickchart.io/chart?width=300&height=200&c=" . urlencode($chartData);
        $chartData = file_get_contents($chartURL);
        $chart = 'data:image/png;base64,' . base64_encode($chartData);

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('relatorios.atendimentos', compact('atendimentos', 'chart'))->render());
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream('relatorio_atendimentos.pdf');
    }
}
