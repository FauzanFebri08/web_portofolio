<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema; // 💡 Pake Schema Jan

class UserForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([ 
                
                TextInput::make('name')
                    ->required()
                    ->maxLength(150),

                TextInput::make('username')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(150),

                TextInput::make('password')
                    ->password()
                    ->required(fn (string $context): bool => $context === 'create') 
                    ->dehydrated(fn ($state) => filled($state)) 
                    ->maxLength(255),

                FileUpload::make('photo_profile')
                    ->image()
                    ->directory('profile-photos')
                    ->nullable(),

                Textarea::make('short_bio')
                    ->rows(3)
                    ->maxLength(65535),
            ]);
    }
}