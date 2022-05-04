<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Brand;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;


    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('brand_id')->options(Brand::pluck('name', 'id')->toArray()),
            Filter::make('price')
                ->form([
                    TextInput::make('price_from'),
                    TextInput::make('price_to')
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['price_from'],
                            fn (Builder $query, $price): Builder => $query->where('price', '>=', $price),
                        )
                        ->when(
                            $data['price_to'],
                            fn (Builder $query, $price): Builder => $query->where('price', '<=', $price),
                        );
                })
        ];
    }
}