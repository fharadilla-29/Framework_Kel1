<?php

namespace App\Filament\Widgets;

use App\Models\Warga;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AgamaChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Agama';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $agamaData = Warga::select('agama', DB::raw('count(*) as total'))
            ->whereNotNull('agama')
            ->groupBy('agama')
            ->pluck('total', 'agama')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Warga',
                    'data' => array_values($agamaData),
                    'backgroundColor' => [
                        'rgb(34, 197, 94)',   // Green
                        'rgb(59, 130, 246)',  // Blue
                        'rgb(168, 85, 247)',  // Purple
                        'rgb(251, 146, 60)',  // Orange
                        'rgb(234, 179, 8)',   // Yellow
                        'rgb(236, 72, 153)',  // Pink
                    ],
                ],
            ],
            'labels' => array_keys($agamaData),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'aspectRatio' => 2,
        ];
    }
}
