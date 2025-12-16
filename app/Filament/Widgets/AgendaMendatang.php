<?php

namespace App\Filament\Widgets;

use App\Models\Agenda;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AgendaMendatang extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Agenda::query()
                    ->where('tanggal_mulai', '>=', now())
                    ->orderBy('tanggal_mulai', 'asc')
                    ->limit(5)
            )
            ->heading('📅 Agenda Mendatang')
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->label('Tanggal & Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Agenda')
                    ->searchable()
                    ->weight('bold')
                    ->limit(40),
                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->icon('heroicon-o-map-pin')
                    ->limit(30),
                Tables\Columns\TextColumn::make('penyelenggara')
                    ->label('Penyelenggara')
                    ->icon('heroicon-o-user-group')
                    ->limit(30),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Lihat')
                    ->url(fn (Agenda $record): string => route('filament.admin.resources.agendas.edit', $record))
                    ->icon('heroicon-o-eye'),
            ]);
    }
}
