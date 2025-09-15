<?php

namespace App\Filament\Resources\DirectorMessages\Pages;

use App\Filament\Resources\DirectorMessages\DirectorMessageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDirectorMessages extends ListRecords
{
    protected static string $resource = DirectorMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
