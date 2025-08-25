<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HeroInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
