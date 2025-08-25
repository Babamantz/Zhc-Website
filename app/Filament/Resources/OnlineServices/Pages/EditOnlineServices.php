<?php

namespace App\Filament\Resources\OnlineServices\Pages;

use App\Filament\Resources\OnlineServices\OnlineServicesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOnlineServices extends EditRecord
{
    protected static string $resource = OnlineServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
