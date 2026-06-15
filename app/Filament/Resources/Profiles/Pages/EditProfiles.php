<?php

namespace App\Filament\Resources\Profiles\Pages;

use App\Filament\Resources\Profiles\ProfilesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfiles extends EditRecord
{
    protected static string $resource = ProfilesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
