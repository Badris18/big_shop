<?php

namespace App\Filament\Resources\NewsLetterResource\Pages;

use App\Filament\Resources\NewsLetterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

//-------------------------------------------------------------

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

use App\Models\NewsLetter;
use App\Enums\NewsLetterStatus;

class ListNewsLetters extends ListRecords
{
    protected static string $resource = NewsLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs():array{

        return[

            'all'=>Tab::make()
            ->badge(NewsLetter::all()->count()),

            'SUBSCRIBE' => Tab::make()
                ->badge(NewsLetter::query()->where('status', NewsLetterStatus::SUBSCRIBE->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', NewsLetterStatus::SUBSCRIBE->value)),

            'UNSUBSCRIBE' => Tab::make()
                ->badge(NewsLetter::query()->where('status', NewsLetterStatus::UNSUBSCRIBE->value)->count())
                ->modifyQueryUsing(fn (Builder $query)=> $query->where('status', NewsLetterStatus::UNSUBSCRIBE->value)),
            
        ];
    }
}
