<?php

namespace App\Filament\Resources\Profiles\Pages;

use App\Filament\Resources\Profiles\ProfilesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfilesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
