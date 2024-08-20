<?php

namespace App\Filament\Resources\CreateDiscountResource\Pages;

use App\Filament\Resources\CreateDiscountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

//-----------------------------------------------------------------

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

use App\Models\CreateDiscount;
use App\Enums\DiscountType;

class ListCreateDiscounts extends ListRecords
{
    protected static string $resource = CreateDiscountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs():array{

        return[

            'all'=>Tab::make()
            ->badge(CreateDiscount::all()->count()),

            'COUPON_CODE' => Tab::make()
                ->badge(CreateDiscount::query()->where('type', DiscountType::COUPON_CODE->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('type', DiscountType::COUPON_CODE->value)),

            'PROMOTION' => Tab::make()
                ->badge(CreateDiscount::query()->where('type', DiscountType::PROMOTION->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('type', DiscountType::PROMOTION->value)),
            
        ];
    }
}
