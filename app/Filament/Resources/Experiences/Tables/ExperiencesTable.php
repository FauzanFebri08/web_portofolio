<?php

namespace App\Filament\Resources\Experiences\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ExperiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama User')
                    ->sortable(),

                TextColumn::make('position_title')
                    ->label('Jabatan')
                    ->searchable(),

                TextColumn::make('organization_name')
                    ->label('Perusahaan/Organisasi')
                    ->searchable(),

                TextColumn::make('start_date')
                    ->label('Tanggal Mulai')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('Tanggal Selesai')
                    ->date('d/m/Y')
                    ->sortable()
                    ->placeholder('Masih Bekerja'),

                IconColumn::make('is_curent')
                    ->label('Status Aktif')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->columns(array_merge($table->getColumns(), [
                TextColumn::make('id')
                    ->label('Aksi')
                    ->formatStateUsing(fn () => '📝 Edit')
                    ->url(fn ($record): string => url("/admin/experiences/{$record->id}/edit"))
                    ->color('warning'),
            ]));
    }
}