<?php

namespace App\Filament\Widgets;

use App\Models\Warga;
use Filament\Widgets\ChartWidget;

class WargaDemografiChart extends ChartWidget
{
    protected static ?string $heading = 'Demografi Warga';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $lakiLaki = Warga::where('jenis_kelamin', 'L')->count();
        $perempuan = Warga::where('jenis_kelamin', 'P')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Warga',
                    'data' => [$lakiLaki, $perempuan],
                    'backgroundColor' => [
                        'rgb(59, 130, 246)',  // Blue untuk Laki-laki
                        'rgb(236, 72, 153)',  // Pink untuk Perempuan
                    ],
                ],
            ],
            'labels' => ['Laki-laki', 'Perempuan'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'aspectRatio' => 2,
        ];
    }
}
