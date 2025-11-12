<?php

namespace App\Filament\Resources\YVideos;

use UnitEnum;
use BackedEnum;
use App\Models\YVideos;
use Filament\Tables\Table;
use App\Models\YoutubeVideo;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\YVideos\Pages\EditYVideos;
use App\Filament\Resources\YVideos\Pages\ListYVideos;
use App\Filament\Resources\YVideos\Pages\ViewYVideos;
use App\Filament\Resources\YVideos\Pages\CreateYVideos;
use App\Filament\Resources\YVideos\Schemas\YVideosForm;
use App\Filament\Resources\YVideos\Tables\YVideosTable;
use App\Filament\Resources\YVideos\Schemas\YVideosInfolist;

class YVideosResource extends Resource
{
    protected static ?string $model = YoutubeVideo::class;

    protected static string | UnitEnum | null $navigationGroup = 'Home';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::VideoCamera;

    public static function form(Schema $schema): Schema
    {
        return YVideosForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return YVideosInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return YVideosTable::configure($table);
    }


    protected static function afterCreate(Model $record): void
    {
        Cache::forget('index.videos');
    }

    protected static function afterUpdate(Model $record): void
    {
        Cache::forget('index.videos');
    }

    protected static function afterDelete(Model $record): void
    {
        Cache::forget('index.videos');
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
            'index' => ListYVideos::route('/'),
            'create' => CreateYVideos::route('/create'),
            'view' => ViewYVideos::route('/{record}'),
            'edit' => EditYVideos::route('/{record}/edit'),
        ];
    }
}
