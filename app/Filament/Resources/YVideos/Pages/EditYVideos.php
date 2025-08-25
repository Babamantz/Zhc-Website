<?php

namespace App\Filament\Resources\YVideos\Pages;

use App\Filament\Resources\YVideos\YVideosResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditYVideos extends EditRecord
{
    protected static string $resource = YVideosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
