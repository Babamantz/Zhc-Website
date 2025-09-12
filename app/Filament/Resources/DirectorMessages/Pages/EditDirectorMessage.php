<?php

namespace App\Filament\Resources\DirectorMessages\Pages;

use App\Filament\Resources\DirectorMessages\DirectorMessageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDirectorMessage extends EditRecord
{
    protected static string $resource = DirectorMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
