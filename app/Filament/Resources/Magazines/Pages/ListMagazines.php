<?php

namespace App\Filament\Resources\Magazines\Pages;

use App\Filament\Resources\Magazines\MagazinesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMagazines extends ListRecords
{
    protected static string $resource = MagazinesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
