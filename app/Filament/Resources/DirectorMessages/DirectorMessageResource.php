<?php

namespace App\Filament\Resources\DirectorMessages;

use App\Filament\Resources\DirectorMessages\Pages\CreateDirectorMessage;
use App\Filament\Resources\DirectorMessages\Pages\EditDirectorMessage;
use App\Filament\Resources\DirectorMessages\Pages\ListDirectorMessages;
use App\Filament\Resources\DirectorMessages\Schemas\DirectorMessageForm;
use App\Filament\Resources\DirectorMessages\Tables\DirectorMessagesTable;
use App\Models\DirectorMessage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DirectorMessageResource extends Resource
{
    protected static ?string $model = DirectorMessage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DirectorMessageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DirectorMessagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDirectorMessages::route('/'),
            'create' => CreateDirectorMessage::route('/create'),
            'edit' => EditDirectorMessage::route('/{record}/edit'),
        ];
    }
}
