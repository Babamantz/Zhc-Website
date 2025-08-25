<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options(['label' => 'Label', 'pdf' => 'Pdf'])
                    ->default('label')
                    ->required(),
                TextInput::make('Url')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('announcement')
                ->label('Upload PDF')
                ->downloadable()
                ->openable(),
                TextInput::make('announcement')
                    ->required(),
            ]);
    }
}
