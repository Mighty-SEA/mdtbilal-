<?php

namespace App\Filament\Resources\SppPaymentResource\Pages;

use App\Filament\Resources\SppPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSppPayments extends ListRecords
{
    protected static string $resource = SppPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\CreateAction::make('create2')->label('Create SPP Payment 2')->url(fn() => SppPaymentResource::getUrl('create2')),
        ];
    }
}
