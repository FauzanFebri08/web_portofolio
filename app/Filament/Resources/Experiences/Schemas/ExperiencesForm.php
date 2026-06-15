<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExperiencesForm
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

                TextInput::make('position_title')
                    ->required()
                    ->maxLength(150),

                TextInput::make('organization_name')
                    ->required()
                    ->maxLength(150),

                DatePicker::make('start_date')
                    ->required()
                    ->displayFormat('d/m/Y'),

                DatePicker::make('end_date')
                    ->displayFormat('d/m/Y')
                    ->disabled(fn ($get) => $get('is_current')), 

                Toggle::make('is_current')
                    ->label('Masih Bekerja di Sini?')
                    ->live() 
                    ->default(false),

                Textarea::make('description')
                    ->rows(3)
                    ->maxLength(65535),
            ]);
    }
}