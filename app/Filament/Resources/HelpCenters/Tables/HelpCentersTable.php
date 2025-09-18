<?php

namespace App\Filament\Resources\HelpCenters\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class HelpCentersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title')
                    ->label('Main Title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->limit(50)
                    ->label('Description'),
                // TextColumn::make('phones')
                //     ->label('Phones')
                //     ->formatStateUsing(fn($state) => $state)
                //     ->wrap(),
                // TextColumn::make('phones')
                //     ->label('Phones')
                //     ->formatStateUsing(
                //         fn($state) =>(dd($state))
                //         // collect($state)->map(fn($p) => $p['number'] . ' (' . $p['label'] . ')')->join(', ')
                //     )
                //     ->wrap(),
                TextColumn::make('phones')
                    ->label('Phones')
                    ->formatStateUsing(function ($state) {
                        if (blank($state)) {
                            return '';
                        }

                        // Normalize to array of phones
                        $phones = is_assoc($state) ? [$state] : $state;

                        return collect($phones)
                            ->map(fn($p) => ($p['label'] ?? '') . ': ' . ($p['number'] ?? ''))
                            ->filter()
                            ->join(', ');
                    })
                    ->wrap(),
                TextColumn::make('whatsapp')
                    ->label('WhatsApp'),

                TextColumn::make('email')
                    ->label('Email'),
                SpatieMediaLibraryImageColumn::make("background_image")
                    ->label('News Images')
                    ->collection("help_center")
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
