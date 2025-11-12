<?php

namespace App\Filament\Resources\Properties;

use UnitEnum;
use BackedEnum;
use App\Models\Property;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\Properties\Pages\EditProperties;
use App\Filament\Resources\Properties\Pages\ListProperties;
use App\Filament\Resources\Properties\Pages\ViewProperties;
use App\Filament\Resources\Properties\Pages\CreateProperties;
use App\Filament\Resources\Properties\Schemas\PropertiesForm;
use App\Filament\Resources\Properties\Tables\PropertiesTable;
use App\Filament\Resources\Properties\Schemas\PropertiesInfolist;

class PropertiesResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::HomeModern;


    protected static string | UnitEnum | null $navigationGroup = 'Home';

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

    protected static function afterCreate(Model $record): void
    {
        Cache::forget('index.properties');
    }

    protected static function afterUpdate(Model $record): void
    {
        Cache::forget('index.properties');
    }

    protected static function afterDelete(Model $record): void
    {
        Cache::forget('index.properties');
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
