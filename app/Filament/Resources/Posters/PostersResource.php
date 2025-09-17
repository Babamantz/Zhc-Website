<?php

namespace App\Filament\Resources\Posters;

use App\Filament\Resources\Posters\Pages\CreatePosters;
use App\Filament\Resources\Posters\Pages\EditPosters;
use App\Filament\Resources\Posters\Pages\ListPosters;
use App\Filament\Resources\Posters\Schemas\PostersForm;
use App\Filament\Resources\Posters\Tables\PostersTable;
use App\Models\PosterAdvitising;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PostersResource extends Resource
{
    protected static ?string $model = PosterAdvitising::class;

    
    protected static string | UnitEnum | null $navigationGroup = 'Home';

    
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    



    

    public static function form(Schema $schema): Schema
    {
        return PostersForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostersTable::configure($table);
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
            'index' => ListPosters::route('/'),
            'create' => CreatePosters::route('/create'),
            'edit' => EditPosters::route('/{record}/edit'),
        ];
    }
}
