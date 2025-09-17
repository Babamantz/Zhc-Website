<?php

namespace App\Filament\Resources\Users\Schemas;

use Pages\CreateUser;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),

                // ✅ Password with reset support
                TextInput::make('password')
                    ->password()
                    ->label(fn($livewire) => str($livewire::class)->contains('Create') ? 'Password' : 'Reset Password')
                    ->required(fn($livewire) => str($livewire::class)->contains('Create'))
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn($state) => filled($state)),


                // ✅ Assign roles directly
                Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name') // uses Spatie relationship
                    ->preload()
                    ->searchable()
                    ->label('Roles'),
            ]);
    }
}
