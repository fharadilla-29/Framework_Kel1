<?php

namespace App\Filament\Widgets;

use App\Models\Warga;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Galeri;
use App\Models\Media;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Warga', Warga::count())
                ->description('Jumlah warga terdaftar')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success')
                ->chart([7, 12, 8, 15, 10, 18, 20]),
            
            Stat::make('Berita', Berita::count())
                ->description(Berita::where('status', 'terbit')->count() . ' berita terbit')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('primary')
                ->chart([5, 8, 6, 10, 7, 12, 15]),
            
            Stat::make('Agenda Mendatang', Agenda::where('tanggal_mulai', '>=', now())->count())
                ->description('Dalam 30 hari ke depan')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('warning')
                ->chart([2, 3, 4, 2, 5, 4, 6]),
            
            Stat::make('Galeri', Galeri::count())
                ->description(Media::where('ref_table', 'galeri')->count() . ' total foto')
                ->descriptionIcon('heroicon-o-photo')
                ->color('info')
                ->chart([10, 15, 12, 18, 20, 25, 30]),
        ];
    }
}
