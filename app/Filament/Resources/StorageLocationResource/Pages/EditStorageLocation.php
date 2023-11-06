<?php

namespace App\Filament\Resources\StorageLocationResource\Pages;

use App\Filament\Resources\StorageLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStorageLocation extends EditRecord
{
    protected static string $resource = StorageLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
