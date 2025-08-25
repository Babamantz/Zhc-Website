<?php

namespace App\Filament\Resources\Posters\Pages;

use App\Filament\Resources\Posters\PostersResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPosters extends EditRecord
{
    protected static string $resource = PostersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
