<?php

namespace App\Filament\Resources\HelpCenters\Pages;

use App\Filament\Resources\HelpCenters\HelpCenterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHelpCenters extends ListRecords
{
    protected static string $resource = HelpCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
