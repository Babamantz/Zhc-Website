<?php

namespace App\Filament\Resources\Posters;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\PosterAdvitising;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\Posters\Pages\EditPosters;
use App\Filament\Resources\Posters\Pages\ListPosters;
use App\Filament\Resources\Posters\Pages\CreatePosters;
use App\Filament\Resources\Posters\Schemas\PostersForm;
use App\Filament\Resources\Posters\Tables\PostersTable;

class PostersResource extends Resource
{
    protected static ?string $model = PosterAdvitising::class;


    protected static string | UnitEnum | null $navigationGroup = 'Home';


    protected static string|BackedEnum|null $navigationIcon = Heroicon::Photo;







    public static function form(Schema $schema): Schema
    {
        return PostersForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostersTable::configure($table);
    }

    protected static function afterCreate(Model $record): void
    {
        Cache::forget('index.poster');
    }

    protected static function afterUpdate(Model $record): void
    {
        Cache::forget('index.poster');
    }

    protected static function afterDelete(Model $record): void
    {
        Cache::forget('index.poster');
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
