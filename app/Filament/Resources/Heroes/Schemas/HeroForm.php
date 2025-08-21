<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                FileUpload::make('hero')
                ->label('Hero Image')
                ->image() // Ensures only image uploads
                ->directory('heroes') // Store inside storage/app/public/heroes
                ->disk('public') // Use the "public" disk (make sure it's linked)
                ->visibility('public') // Optional, ensures it's publicly accessible
                ->maxSize(2048) // Optional: limit size in KB
                ->previewable(true)
                ->required(),
            ]);
    }
}
