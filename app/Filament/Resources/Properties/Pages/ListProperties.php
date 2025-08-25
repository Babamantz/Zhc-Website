<?php

namespace App\Filament\Resources\Properties\Pages;

use App\Filament\Resources\Properties\PropertiesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
