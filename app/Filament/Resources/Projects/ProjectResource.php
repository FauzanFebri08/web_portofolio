<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Filament\Resources\Projects\Schemas\ProjectForm;
use App\Models\Projects;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Projects::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedComputerDesktop;
    
    protected static ?string $recordTitleAttribute = 'project_title';

    public static function form(Schema $schema): Schema
    {
        return ProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        
        return \App\Filament\Resources\Projects\Tables\ProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}