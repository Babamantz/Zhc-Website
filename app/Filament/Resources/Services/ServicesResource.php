<?php

namespace App\Filament\Resources\Services;

use BackedEnum;
use App\Models\OurService;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Services\Pages\EditServices;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Filament\Resources\Services\Pages\ViewServices;
use App\Filament\Resources\Services\Pages\CreateServices;
use App\Filament\Resources\Services\Schemas\ServicesForm;
use App\Filament\Resources\Services\Tables\ServicesTable;
use App\Filament\Resources\Services\Schemas\ServicesInfolist;
use UnitEnum;

class ServicesResource extends Resource
{
    protected static ?string $model = OurService::class;

    
    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ServicesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServicesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
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
            'index' => ListServices::route('/'),
            'create' => CreateServices::route('/create'),
            'view' => ViewServices::route('/{record}'),
            'edit' => EditServices::route('/{record}/edit'),
        ];
    }
}
