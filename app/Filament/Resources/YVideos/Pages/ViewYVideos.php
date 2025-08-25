<?php

namespace App\Filament\Resources\YVideos\Pages;

use App\Filament\Resources\YVideos\YVideosResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewYVideos extends ViewRecord
{
    protected static string $resource = YVideosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
