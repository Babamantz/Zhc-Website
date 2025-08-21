<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('href')
                    ->required(),
                TextInput::make('img')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                DateTimePicker::make('date')
                    ->required(),
                TextInput::make('content')
                    ->required(),
                TextInput::make('excerpt')
                    ->required(),
            ]);
    }
}
