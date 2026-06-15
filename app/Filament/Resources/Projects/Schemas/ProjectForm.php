<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_title')
                    ->label('Nama Project')
                    ->required(),

                TextInput::make('project_type')
                    ->label('Tipe Project')
                    ->placeholder('Web Application, Mobile App, dll')
                    ->required(),

                TextInput::make('role')
                    ->label('Role Anda')
                    ->placeholder('Fullstack Developer, Backend, dll')
                    ->required(),

                TextInput::make('client_name')
                    ->label('Nama Client')
                    ->placeholder('Nama Perusahaan atau Personal Project'),

                DatePicker::make('start_date')
                    ->label('Tanggal Mulai')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('Tanggal Selesai'),

                Toggle::make('is_ongoing')
                    ->label('Project Masih Berjalan?')
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi Project')
                    ->required(),

                TextInput::make('technologies')
                    ->label('Tech Stack (Pisahkan dengan koma)')
                    ->placeholder('Laravel, Tailwind CSS, MySQL')
                    ->required(),

                TextInput::make('project_url')
                    ->label('Live Demo URL'),

                TextInput::make('github_url')
                    ->label('GitHub URL'),

                
                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public') 
                    ->required(),
            ]);
    }
}