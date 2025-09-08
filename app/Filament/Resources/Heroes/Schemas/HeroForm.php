<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('img_hero')
                ->columnSpanFull()
                ->collection('hero_image')
                ->image()    // ensures only images
                ->disk('public')
                ->visibility('public')
                ->panelLayout('grid'), // 
                // FileUpload::make('img_hero')
                // ->label('Image Hero')
                // ->directory('heroes') // Store inside storage/app/public/heroes
                // ->disk('public') // Use the "public" disk (make sure it's linked)
                // ->visibility('public') // Optional, ensures it's publicly accessible
                // ->maxSize(2048) // Optional: limit size in KB
                // ->previewable(true)
                // ->multiple()
                // ->reorderable()
                // ->image()
                // ->columnSpanFull()
                // ->required(),
            ]);
    }
}
