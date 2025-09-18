<?php

namespace App\Filament\Resources\HelpCenters\Pages;

use App\Filament\Resources\HelpCenters\HelpCenterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHelpCenter extends EditRecord
{
    protected static string $resource = HelpCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
