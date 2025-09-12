<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use App\Models\MenuItem;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Select::make('menu_id')
                ->label('Menu')
                ->relationship(
                    name: 'menu',        // must match the relation method in your model
                    titleAttribute: 'name', // field to display from parent
                )
                ->searchable()
                ->preload()
                ->nullable(),
                Select::make('parent_id')
                ->label('Parent Menu Item')
                    ->options(MenuItem::whereNull('parent_id')->pluck('title', 'id'))
                    ->searchable()
                    ->nullable(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('url'),
                Select::make('target')
                    ->options(['_blank' => ' blank', '_self' => ' self'])
                    ->default('_self')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
