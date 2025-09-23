<?php

namespace App\Filament\Resources\Magazines;

use BackedEnum;
use App\Models\Magazine;
use App\Models\Magazines;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Magazines\Pages\EditMagazines;
use App\Filament\Resources\Magazines\Pages\ListMagazines;
use App\Filament\Resources\Magazines\Pages\CreateMagazines;
use App\Filament\Resources\Magazines\Schemas\MagazinesForm;
use App\Filament\Resources\Magazines\Tables\MagazinesTable;
use UnitEnum;

class MagazinesResource extends Resource
{
    protected static ?string $model = Magazine::class;

    protected static string | UnitEnum | null $navigationGroup = 'Publications';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;

    public static function form(Schema $schema): Schema
    {
        return MagazinesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MagazinesTable::configure($table);
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
            'index' => ListMagazines::route('/'),
            'create' => CreateMagazines::route('/create'),
            'edit' => EditMagazines::route('/{record}/edit'),
        ];
    }
}
