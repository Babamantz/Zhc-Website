<?php

namespace App\Filament\Resources\AboutUs\Pages;

use App\Traits\ClearsCache;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AboutUs\AboutUsResource;

class EditAboutUs extends EditRecord
{
    use ClearsCache;
    protected static string $resource = AboutUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $this->clearCache('about_zhc');

        // Optional: Show success notification
        // Notification::make()
        //     ->title('About Us Updated')
        //     ->success()
        //     ->send();
    }

    // Optional: Clear cache after delete as well
    protected function afterDelete(): void
    {
        $this->clearCache('about_zhc');
    }
}
