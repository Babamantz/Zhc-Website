<?php

namespace App\Filament\Resources\Photos;

use BackedEnum;
use App\Models\Photo;
use App\Models\Photos;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Photos\Pages\EditPhotos;
use App\Filament\Resources\Photos\Pages\ListPhotos;
use App\Filament\Resources\Photos\Pages\CreatePhotos;
use App\Filament\Resources\Photos\Schemas\PhotosForm;
use App\Filament\Resources\Photos\Tables\PhotosTable;
use UnitEnum;

class PhotosResource extends Resource
{
    protected static ?string $model = Photo::class;

     protected static string | UnitEnum | null $navigationGroup = 'Publications';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PhotosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PhotosTable::configure($table);
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
            'index' => ListPhotos::route('/'),
            'create' => CreatePhotos::route('/create'),
            'edit' => EditPhotos::route('/{record}/edit'),
        ];
    }
}
