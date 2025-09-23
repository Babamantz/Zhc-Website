<?php

namespace App\Filament\Resources\Structures;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Models\OrganizationStructure;
use App\Filament\Resources\Structures\Pages\EditStructure;
use App\Filament\Resources\Structures\Pages\ListStructures;
use App\Filament\Resources\Structures\Pages\CreateStructure;
use App\Filament\Resources\Structures\Schemas\StructureForm;
use App\Filament\Resources\Structures\Tables\StructuresTable;

class StructureResource extends Resource
{
    protected static ?string $model = OrganizationStructure::class;

    protected static string | UnitEnum | null $navigationGroup = 'About';

    public static function getNavigationLabel(): string
    {
        return 'Organization Structure';
    }

    public static function getPluralLabel(): string
    {
        return 'Organization Structure';
    }

    public static function getLabel(): string
    {
        return 'Organization Structure';
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice2;

    public static function form(Schema $schema): Schema
    {
        return StructureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StructuresTable::configure($table);
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
            'index' => ListStructures::route('/'),
            'create' => CreateStructure::route('/create'),
            'edit' => EditStructure::route('/{record}/edit'),
        ];
    }
}
