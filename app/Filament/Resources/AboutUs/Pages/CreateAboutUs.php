<?php

namespace App\Filament\Resources\AboutUs\Pages;

use App\Filament\Resources\AboutUs\AboutUsResource;
use App\Traits\ClearsCache;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutUs extends CreateRecord
{

    use ClearsCache;
    protected static string $resource = AboutUsResource::class;

    protected function afterCreate()
    {
        $this->clearCache('about_zhc');
    }


    protected function afterDelete(): void
    {
        $this->clearCache('about_zhc');
    }
}
