<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


use Filament\Resources\Components\Tab;

use Illuminate\Database\Eloquent\Builder;

use App\Models\Category;

use App\Enums\CategoryStatus;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs():array{

        return[

            'all'=>Tab::make()
            ->badge(Category::all()->count()),

            'PUBLISHED' => Tab::make()
                ->badge(Category::query()->where('status', CategoryStatus::PUBLISHED->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', CategoryStatus::PUBLISHED->value)),

            'DRAFT' => Tab::make()
                ->badge(Category::query()->where('status', CategoryStatus::DRAFT->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', CategoryStatus::DRAFT->value)),
            
            'PENDING' => Tab::make()
                ->badge(Category::query()->where('status', CategoryStatus::PENDING->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', CategoryStatus::PENDING->value)),
        ];
    }
}
