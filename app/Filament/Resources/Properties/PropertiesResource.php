<?php

namespace App\Filament\Resources\Properties;

use App\Filament\Resources\Properties\Pages\CreateProperties;
use App\Filament\Resources\Properties\Pages\EditProperties;
use App\Filament\Resources\Properties\Pages\ListProperties;
use App\Filament\Resources\Properties\Pages\ViewProperties;
use App\Filament\Resources\Properties\Schemas\PropertiesForm;
use App\Filament\Resources\Properties\Schemas\PropertiesInfolist;
use App\Filament\Resources\Properties\Tables\PropertiesTable;
use App\Models\Property;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PropertiesResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PropertiesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PropertiesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PropertiesTable::configure($table);
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
            'index' => ListProperties::route('/'),
            'create' => CreateProperties::route('/create'),
            'view' => ViewProperties::route('/{record}'),
            'edit' => EditProperties::route('/{record}/edit'),
        ];
    }
}
