<?php

namespace App\Filament\Resources\FAQs;

use BackedEnum;
use App\Models\FAQ;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\FAQs\Pages\EditFAQs;
use App\Filament\Resources\FAQs\Pages\ListFAQs;
use App\Filament\Resources\FAQs\Pages\CreateFAQs;
use App\Filament\Resources\FAQs\Schemas\FAQsForm;
use App\Filament\Resources\FAQs\Tables\FAQsTable;

class FAQsResource extends Resource
{
    protected static ?string $model = FAQ::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'FAQ';

    public static function form(Schema $schema): Schema
    {
        return FAQsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FAQsTable::configure($table);
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
            'index' => ListFAQs::route('/'),
            'create' => CreateFAQs::route('/create'),
            'edit' => EditFAQs::route('/{record}/edit'),
        ];
    }
}
