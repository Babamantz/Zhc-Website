<?php

namespace App\Filament\Resources\HelpCenters\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class HelpCenterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('title')
                    ->label('Main Title')
                    ->required(),
                Textarea::make('description')
                    ->rows(3),
                SpatieMediaLibraryFileUpload::make('background_image')
                    ->image()
                    ->disk('public')
                    ->columnSpanFull()
                    ->collection('help_center')
                    ->responsiveImages()
                    ->conversion('webp'),

                Repeater::make('phones')
                    ->schema([
                        TextInput::make('number')->label('Phone Number'),
                        TextInput::make('label')->label('Label')->placeholder('Call Center, Integrity Complaints...'),
                    ])
                    ->columns(2),

                TextInput::make('whatsapp')->label('WhatsApp Number'),
                TextInput::make('email')->email(),
            ]);
    }
}
