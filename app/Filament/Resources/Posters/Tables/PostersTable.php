<?php

namespace App\Filament\Resources\Posters\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class PostersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title"),
                TextColumn::make("alt"),
                SpatieMediaLibraryImageColumn::make("poster_image")
                ->collection("posters")
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
