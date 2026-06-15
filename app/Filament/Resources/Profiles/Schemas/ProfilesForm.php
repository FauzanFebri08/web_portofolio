<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class ProfilesForm
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

                
                Textarea::make('description')
                    ->rows(3)
                    ->maxLength(65535),

                
                Textarea::make('professional_vision')
                    ->rows(3)
                    ->maxLength(65535),

                
                Textarea::make('mission')
                    ->rows(3)
                    ->maxLength(65535),

                
                TextInput::make('location')
                    ->maxLength(150),

                
                DatePicker::make('date_of_birth')
                    ->displayFormat('d/m/Y'),
            ]);
    }
}