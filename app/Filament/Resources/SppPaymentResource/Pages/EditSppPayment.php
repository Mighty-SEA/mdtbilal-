<?php

namespace App\Filament\Resources\SppPaymentResource\Pages;

use App\Filament\Resources\SppPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSppPayment extends EditRecord
{
    protected static string $resource = SppPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
