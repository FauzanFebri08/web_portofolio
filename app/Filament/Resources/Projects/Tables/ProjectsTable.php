<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction; 
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->circular(),

                TextColumn::make('project_title')
                    ->label('Nama Project')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('project_type')
                    ->label('Tipe')
                    ->badge()
                    ->sortable(),

                TextColumn::make('client_name')
                    ->label('Client')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('role')
                    ->label('Role'),

                IconColumn::make('is_ongoing')
                    ->label('Ongoing?')
                    ->boolean(),

                TextColumn::make('user.name')
                    ->label('Pemilik')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}