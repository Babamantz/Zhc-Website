<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFaqs extends ViewRecord
{
    protected static string $resource = FaqsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
