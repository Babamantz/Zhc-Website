<?php

namespace App\Filament\Resources\OnlineServices\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OnlineServicesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('title'),
                TextInput::make('alt'),
                SpatieMediaLibraryFileUpload::make('image')
                    ->disk('public')
                    ->visibility('public')
                    ->collection('logos')
                    ->columnSpanFull(),
            ]);
    }
}
