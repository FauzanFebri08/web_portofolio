<?php

namespace App\Filament\Resources\Skills\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class SkillsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                
                TextColumn::make('user.name')
                    ->label('Nama User')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('skill_name')
                    ->label('Nama Skill')
                    ->searchable(),

                TextColumn::make('proficiency_level')
                    ->label('Tingkat Keahlian')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'expert' => 'success',
                        'advanced' => 'info',
                        'intermediate' => 'warning',
                        default => 'secondary',
                    }),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            
            ->columns(array_merge($table->getColumns(), [
                TextColumn::make('id')
                    ->label('Aksi')
                    ->formatStateUsing(fn () => ' Edit')
                    ->url(fn ($record): string => url("/admin/skills/{$record->id}/edit"))
                    ->color('warning'),
            ]));
    }
}