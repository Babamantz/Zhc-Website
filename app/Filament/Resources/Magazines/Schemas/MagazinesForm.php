<?php

namespace App\Filament\Resources\Magazines\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class MagazinesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
             
            ]);
    }
}
