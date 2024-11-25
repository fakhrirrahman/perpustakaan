<?php

namespace App\Filament\Resources\PerpustakaanResource\Pages;

use App\Filament\Resources\PerpustakaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerpustakaans extends ListRecords
{
    protected static string $resource = PerpustakaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
