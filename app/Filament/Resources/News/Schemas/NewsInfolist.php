<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NewsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('url'),
                TextEntry::make('title'),
                TextEntry::make('date')
                    ->dateTime(),
                TextEntry::make('content'),
                TextEntry::make('excerpt'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
