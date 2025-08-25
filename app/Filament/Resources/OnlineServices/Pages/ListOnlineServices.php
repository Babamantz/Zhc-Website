<?php

namespace App\Filament\Resources\OnlineServices\Pages;

use App\Filament\Resources\OnlineServices\OnlineServicesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOnlineServices extends ListRecords
{
    protected static string $resource = OnlineServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
