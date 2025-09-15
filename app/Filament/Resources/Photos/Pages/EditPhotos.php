<?php

namespace App\Filament\Resources\Photos\Pages;

use App\Filament\Resources\Photos\PhotosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPhotos extends EditRecord
{
    protected static string $resource = PhotosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
