<?php

namespace App\Filament\Resources\Management\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ManagementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                SpatieMediaLibraryFileUpload::make('management_img')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->collection('management_images')
                    ->responsiveImages(),
                Select::make('level')
                    ->options(['level_one' => 'level_one', 'level_two' => 'level_two', 'level_three' => 'level_three', 'level_four' => 'level_four'])
                    ->default('label')
                    ->required(),
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('role')
                    ->required(),
                TextInput::make('title')
                    ->required(),
            ]);
    }
}
