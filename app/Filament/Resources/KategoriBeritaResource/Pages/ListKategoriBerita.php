<?php

namespace App\Filament\Resources\KategoriBeritaResource\Pages;

use App\Filament\Resources\KategoriBeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriBerita extends ListRecords
{
    protected static string $resource = KategoriBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

