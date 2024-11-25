<?php

namespace App\Filament\Resources\PerpustakaanResource\Pages;

use App\Filament\Resources\PerpustakaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerpustakaan extends EditRecord
{
    protected static string $resource = PerpustakaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
