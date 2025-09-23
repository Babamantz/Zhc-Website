<?php

namespace App\Filament\Resources\HelpCenters;

use App\Filament\Resources\HelpCenters\Pages\CreateHelpCenter;
use App\Filament\Resources\HelpCenters\Pages\EditHelpCenter;
use App\Filament\Resources\HelpCenters\Pages\ListHelpCenters;
use App\Filament\Resources\HelpCenters\Schemas\HelpCenterForm;
use App\Filament\Resources\HelpCenters\Tables\HelpCentersTable;
use App\Models\HelpCenter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HelpCenterResource extends Resource
{
    protected static ?string $model = HelpCenter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowPathRoundedSquare;
    protected static string | UnitEnum | null $navigationGroup = 'Pages';


    public static function form(Schema $schema): Schema
    {
        return HelpCenterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HelpCentersTable::configure($table);
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
            'index' => ListHelpCenters::route('/'),
            'create' => CreateHelpCenter::route('/create'),
            'edit' => EditHelpCenter::route('/{record}/edit'),
        ];
    }
}
