<?php

namespace App\Filament\Resources\BoardMembers;

use BackedEnum;
use Filament\Tables\Table;
use App\Models\BoardMember;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\BoardMembers\Pages\EditBoardMembers;
use App\Filament\Resources\BoardMembers\Pages\ListBoardMembers;
use App\Filament\Resources\BoardMembers\Pages\CreateBoardMembers;
use App\Filament\Resources\BoardMembers\Schemas\BoardMembersForm;
use App\Filament\Resources\BoardMembers\Tables\BoardMembersTable;
use UnitEnum;

class BoardMembersResource extends Resource
{
    protected static ?string $model = BoardMember::class;

    protected static string | UnitEnum | null $navigationGroup = 'About';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;


    public static function form(Schema $schema): Schema
    {
        return BoardMembersForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BoardMembersTable::configure($table);
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
            'index' => ListBoardMembers::route('/'),
            'create' => CreateBoardMembers::route('/create'),
            'edit' => EditBoardMembers::route('/{record}/edit'),
        ];
    }
}
