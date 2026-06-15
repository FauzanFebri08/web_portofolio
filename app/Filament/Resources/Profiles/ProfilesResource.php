<?php

namespace App\Filament\Resources\Profiles;

use App\Filament\Resources\Profiles\Pages\CreateProfiles;
use App\Filament\Resources\Profiles\Pages\EditProfiles;
use App\Filament\Resources\Profiles\Pages\ListProfiles;
use App\Filament\Resources\Profiles\Schemas\ProfilesForm;
use App\Filament\Resources\Profiles\Tables\ProfilesTable;
use App\Models\Profiles;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilesResource extends Resource
{
    protected static ?string $model = Profiles::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static ?string $recordTitleAttribute = 'profiles';

    public static function form(Schema $schema): Schema
    {
        return ProfilesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilesTable::configure($table);
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
            'index' => ListProfiles::route('/'),
            'create' => CreateProfiles::route('/create'),
            'edit' => EditProfiles::route('/{record}/edit'),
        ];
    }
}
