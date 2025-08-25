<?php

namespace App\Filament\Resources\Properties\Pages;

use App\Filament\Resources\Properties\PropertiesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProperties extends ViewRecord
{
    protected static string $resource = PropertiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
