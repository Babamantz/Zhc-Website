<?php

namespace App\Filament\Resources\YVideos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class YVideosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //    
                TextInput::make('title')
                    ->required(),
                TextInput::make('url')
                    ->required(),
            ]);
    }
}
