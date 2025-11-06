<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                  SpatieMediaLibraryFileUpload::make('img_news')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->collection('news')
                    ->responsiveImages(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                DateTimePicker::make('date')
                    ->required(),
                RichEditor::make('content')
                ->columnSpanFull()
                    ->required(),
                RichEditor::make('excerpt')
                ->columnSpanFull()
                    ->required(),
            ]);
    }
}
