<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PropertiesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                 TextInput::make('title')
                    ->required(),
                TextInput::make('excerpt')
                    ->required(),
                RichEditor::make('content')
                ->columnSpanFull()
                    ->required(),
                SpatieMediaLibraryFileUpload::make('property_images')
                ->columnSpanFull()
                   ->collection('properties')
                   ->required(),
            ]);
    }
}
