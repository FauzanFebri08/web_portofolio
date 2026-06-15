<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('contact_type')
                    ->label('Tipe Kontak')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('contact_value')
                    ->label('Isi Kontak')
                    ->searchable(),

                TextColumn::make('is_public')
                    ->label('Status Publik')
                    ->formatStateUsing(fn ($state): string => $state ? 'Publik' : 'Privat'),

                
                TextColumn::make('id')
                    ->label('Aksi')
                    ->formatStateUsing(fn () => ' Edit')
                    ->url(fn ($record): string => url("/admin/contacts/{$record->id}/edit"))
                    ->color('warning'),
            ])
            ->filters([
                //
            ]);
            
    }
}