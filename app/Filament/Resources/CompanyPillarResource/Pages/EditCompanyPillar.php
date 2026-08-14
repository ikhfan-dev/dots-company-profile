<?php

namespace App\Filament\Resources\CompanyPillarResource\Pages;

use App\Filament\Resources\CompanyPillarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyPillar extends EditRecord
{
    protected static string $resource = CompanyPillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
