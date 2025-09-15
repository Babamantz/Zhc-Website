<?php

namespace App\Filament\Resources\DirectorMessages\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class DirectorMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make("title"),
                TextInput::make("slug"),
                SpatieMediaLibraryFileUpload::make('img_director')
                ->columnSpanFull()
                // ->collection('hero_image')
                ->image()    // ensures only images
                ->disk('public')
                ->visibility('public')
                ->panelLayout('grid'), // 
                RichEditor::make("content")
                ->columnSpanFull()
            ]);
    }
}
