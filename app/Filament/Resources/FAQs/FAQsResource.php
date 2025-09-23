<?php

namespace App\Filament\Resources\Faqs;

use BackedEnum;
use App\Models\Faq;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Faqs\Pages\EditFaqs;
use App\Filament\Resources\Faqs\Pages\ListFaqs;
use App\Filament\Resources\Faqs\Pages\ViewFaqs;
use App\Filament\Resources\Faqs\Pages\CreateFaqs;
use App\Filament\Resources\Faqs\Schemas\FaqsForm;
use App\Filament\Resources\Faqs\Tables\FaqsTable;
use App\Filament\Resources\Faqs\Schemas\FaqsInfolist;
use App\Models\OurFaq;
use UnitEnum;

class FaqsResource extends Resource
{
    protected static ?string $model = OurFaq::class;


    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::QuestionMarkCircle;

    public static function form(Schema $schema): Schema
    {
        return FaqsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FaqsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FaqsTable::configure($table);
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
            'index' => ListFaqs::route('/'),
            'create' => CreateFaqs::route('/create'),
            'view' => ViewFaqs::route('/{record}'),
            'edit' => EditFaqs::route('/{record}/edit'),
        ];
    }
}
