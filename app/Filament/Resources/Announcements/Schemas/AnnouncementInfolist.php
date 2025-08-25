<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AnnouncementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('type'),
                TextEntry::make('Url'),
                TextEntry::make('title'),
                TextEntry::make('announcement'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
