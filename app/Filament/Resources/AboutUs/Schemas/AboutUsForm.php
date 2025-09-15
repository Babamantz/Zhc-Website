<?php

namespace App\Filament\Resources\AboutUs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

class AboutUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                
                TextInput::make('title')->required(),
                TextInput::make('slug')->required()->unique(ignoreRecord:true),
                RichEditor::make('content')
                 ->toolbarButtons([
                    'bold', 'italic', 'underline', 'strike',
                    'link', 'orderedList', 'bulletList', 'blockquote',
                    'codeBlock', 'h2', 'h3', 'table'
                ])
                ->columnSpanFull(),
            ]);
    }
}
