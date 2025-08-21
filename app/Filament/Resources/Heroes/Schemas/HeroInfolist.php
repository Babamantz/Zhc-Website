<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;

class HeroInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('slug'),
                ImageColumn::make('hero')->disk('public')->visibility('public')->square(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
 // Tables\Columns\TextColumn::make('slug')
                //     ->searchable(),
                // Tables\Columns\ImageColumn::make('thumbnail'),