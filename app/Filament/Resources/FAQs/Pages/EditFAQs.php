<?php

namespace App\Filament\Resources\FAQs\Pages;

use App\Filament\Resources\FAQs\FAQsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFAQs extends EditRecord
{
    protected static string $resource = FAQsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
