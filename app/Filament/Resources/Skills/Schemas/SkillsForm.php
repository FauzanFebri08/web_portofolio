<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class SkillsForm
{
    // 💡 Di sini tipenya kita ganti jadi Schema semua biar singkron
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([ 
                
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('skill_name')
                    ->required()
                    ->maxLength(100),

                Select::make('proficiency_level')
                    ->options([
                        'beginner' => 'Beginner',
                        'intermediate' => 'Intermediate',
                        'advanced' => 'Advanced',
                        'expert' => 'Expert',
                    ])
                    ->required(),

                TextInput::make('category')
                    ->maxLength(100),
            ]);
    }
}