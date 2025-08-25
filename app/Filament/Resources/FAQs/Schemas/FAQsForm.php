<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FaqsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('header'),
                RichEditor::make('content'),
                
            ]);
    }
}
