<?php

namespace App\Filament\Resources\TesteResource\Pages;

use App\Filament\Resources\TesteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeste extends EditRecord
{
    protected static string $resource = TesteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
