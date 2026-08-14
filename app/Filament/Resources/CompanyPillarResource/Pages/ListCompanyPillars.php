<?php

namespace App\Filament\Resources\CompanyPillarResource\Pages;

use App\Filament\Resources\CompanyPillarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyPillars extends ListRecords
{
    protected static string $resource = CompanyPillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
