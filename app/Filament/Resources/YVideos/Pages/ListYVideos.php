<?php

namespace App\Filament\Resources\YVideos\Pages;

use App\Filament\Resources\YVideos\YVideosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListYVideos extends ListRecords
{
    protected static string $resource = YVideosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
