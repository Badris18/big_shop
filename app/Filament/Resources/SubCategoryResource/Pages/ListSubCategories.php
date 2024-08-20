<?php

namespace App\Filament\Resources\SubCategoryResource\Pages;

use App\Filament\Resources\SubCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
//----------------------------------------------------------
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

use App\Models\SubCategory;
use App\Enums\SubCategoryStatus;

class ListSubCategories extends ListRecords
{
    protected static string $resource = SubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs():array{

        return[

            'all'=>Tab::make()
            ->badge(SubCategory::all()->count()),

            'PUBLISHED' => Tab::make()
                ->badge(SubCategory::query()->where('status', SubCategoryStatus::PUBLISHED->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', SubCategoryStatus::PUBLISHED->value)),

            'DRAFT' => Tab::make()
                ->badge(SubCategory::query()->where('status', SubCategoryStatus::DRAFT->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', SubCategoryStatus::DRAFT->value)),
            
            'PENDING' => Tab::make()
                ->badge(SubCategory::query()->where('status', SubCategoryStatus::PENDING->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', SubCategoryStatus::PENDING->value)),
        ];
    }
}
