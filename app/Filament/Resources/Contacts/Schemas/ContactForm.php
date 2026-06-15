<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                
                Select::make('contact_type')
                    ->options([
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'whatsapp' => 'WhatsApp',
                        'linkedin' => 'LinkedIn',
                        'github' => 'GitHub',
                        'website' => 'Website',
                    ])
                    ->required(),

                
                TextInput::make('contact_value')
                    ->required()
                    ->maxLength(150),

                
                Toggle::make('is_public')
                    ->label('Tampilkan ke Publik?')
                    ->default(true),
            ]);
    }
}