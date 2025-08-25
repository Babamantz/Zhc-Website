<?php

namespace App\Filament\Resources\Posters\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;

class PostersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('title')
                 ->required(),
                TextInput::make('alt')
                ->required(),
                SpatieMediaLibraryFileUpload::make('poster_image')
                    ->image()
                    ->columnSpanFull()
                    ->collection('posters')
                    ->responsiveImages()
                    ->conversion('webp'),
            ]);
    }
}
