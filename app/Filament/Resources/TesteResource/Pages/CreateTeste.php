<?php

namespace App\Filament\Resources\TesteResource\Pages;

use App\Filament\Resources\TesteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeste extends CreateRecord
{
    protected static string $resource = TesteResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['soma'] = $data['valor1'] + $data['valor2'];
        return $data;
    }
}
