<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;

class ProjectsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
             TextInput::make('title')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                RichEditor::make('content')
                ->columnSpanFull()
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('project_name')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('projects_pic')
                ->columnSpanFull()
                   ->collection('projects')
                   ->required(), 
            ]);
    }
}
