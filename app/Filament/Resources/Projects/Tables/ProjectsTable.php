<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                  TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('status')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('content')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('project_name')
                    ->searchable(),
                SpatieMediaLibraryImageColumn::make("projects_pic")
                ->label('Projects IMages')
                ->collection("projects"),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
