<?php

namespace App\Filament\Resources\Properties\Pages;

use App\Filament\Resources\Properties\PropertiesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProperties extends EditRecord
{
    protected static string $resource = PropertiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
