<?php

namespace App\Filament\Resources\OnlineServices;

use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\OnlineService;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\OnlineServices\Pages\EditOnlineServices;
use App\Filament\Resources\OnlineServices\Pages\ListOnlineServices;
use App\Filament\Resources\OnlineServices\Pages\ViewOnlineServices;
use App\Filament\Resources\OnlineServices\Pages\CreateOnlineServices;
use App\Filament\Resources\OnlineServices\Schemas\OnlineServicesForm;
use App\Filament\Resources\OnlineServices\Tables\OnlineServicesTable;
use App\Filament\Resources\OnlineServices\Schemas\OnlineServicesInfolist;
use UnitEnum;

class OnlineServicesResource extends Resource
{
    protected static ?string $model = OnlineService::class;

    
    protected static string | UnitEnum | null $navigationGroup = 'Home';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OnlineServicesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OnlineServicesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnlineServicesTable::configure($table);
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
            'index' => ListOnlineServices::route('/'),
            'create' => CreateOnlineServices::route('/create'),
            'view' => ViewOnlineServices::route('/{record}'),
            'edit' => EditOnlineServices::route('/{record}/edit'),
        ];
    }
}
