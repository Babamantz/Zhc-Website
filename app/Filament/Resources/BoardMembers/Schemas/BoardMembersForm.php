<?php

namespace App\Filament\Resources\BoardMembers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class BoardMembersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                SpatieMediaLibraryFileUpload::make('board_img')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->collection('board_images')
                    ->responsiveImages(),
                Select::make('level')
                    ->options(['level_one' => 'level_one', 'level_two' => 'level_two', 'level_three' => 'level_three','level_four'=>'level_four'])
                    ->default('label')
                    ->required(),
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('role')
                    ->required(),

            ]);
    }
}
