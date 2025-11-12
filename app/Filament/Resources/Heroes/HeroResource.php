<?php

namespace App\Filament\Resources\Heroes;

use UnitEnum;
use BackedEnum;
use App\Models\Hero;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Heroes\Pages\EditHero;
use App\Filament\Resources\Heroes\Pages\ViewHero;
use App\Filament\Resources\Heroes\Pages\CreateHero;
use App\Filament\Resources\Heroes\Pages\ListHeroes;
use App\Filament\Resources\Heroes\Schemas\HeroForm;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Heroes\Tables\HeroesTable;
use App\Filament\Resources\Heroes\Schemas\HeroInfolist;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;


    protected static string | UnitEnum | null $navigationGroup = 'Home';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Photo;

    public static function form(Schema $schema): Schema
    {
        return HeroForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HeroInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroesTable::configure($table);
    }

    protected static function afterCreate(Model $record): void
    {
        Cache::forget('index.hero_slides');
    }

    protected static function afterUpdate(Model $record): void
    {
        Cache::forget('index.hero_slides');
    }

    protected static function afterDelete(Model $record): void
    {
        Cache::forget('index.hero_slides');
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
            'index' => ListHeroes::route('/'),
            'create' => CreateHero::route('/create'),
            'view' => ViewHero::route('/{record}'),
            'edit' => EditHero::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
