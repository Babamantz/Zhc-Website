<?php

namespace App\Filament\Resources\FAQs\Pages;

use App\Filament\Resources\FAQs\FAQsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFAQs extends ListRecords
{
    protected static string $resource = FAQsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
