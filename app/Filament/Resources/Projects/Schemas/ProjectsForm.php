<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProjectsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('title')
                    ->required(),
                Select::make('status')
                    ->options(['completed' => 'completed', 'ongoing' => 'ongoing','upcoming' => 'upcoming'])
                    ->default('label')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('project_name')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('project_pics')
                    ->columnSpanFull()
                    ->collection('project_images')
                    ->disk('public')
                    ->multiple()
                    ->required(),
                RichEditor::make('content')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
