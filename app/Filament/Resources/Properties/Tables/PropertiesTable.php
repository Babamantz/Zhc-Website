<?php

namespace App\Filament\Resources\Properties\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PropertiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title"),
                TextColumn::make("excerpt"),
                TextColumn::make("content"),
                SpatieMediaLibraryImageColumn::make("properties")
                ->collection("properties")
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
