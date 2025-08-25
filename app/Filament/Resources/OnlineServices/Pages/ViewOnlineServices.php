<?php

namespace App\Filament\Resources\OnlineServices\Pages;

use App\Filament\Resources\OnlineServices\OnlineServicesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOnlineServices extends ViewRecord
{
    protected static string $resource = OnlineServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
