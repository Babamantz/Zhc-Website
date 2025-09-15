<?php

namespace App\Filament\Resources\Magazines\Pages;

use App\Filament\Resources\Magazines\MagazinesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMagazines extends EditRecord
{
    protected static string $resource = MagazinesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
