<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Jobs\ExportProducts;
use App\Jobs\ImportProducts;
use App\Models\Brand;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

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


    /**
     * Overwrites the actions
     * @return array
     */
    protected function getActions(): array
    {
        return array_merge(
            parent::getActions(),
            [
                $this->handleCSVImport(),
                $this->getExportToCSVAction()
            ]
        );
    }


    /**
     * Returns the button to handle the CSV Import in a queue
     *
     * @return ButtonAction
     */
    protected function handleCSVImport(): ButtonAction
    {
        return
            ButtonAction::make(__('Import Legacy Products'))
            ->action(function (Collection $records, array $data): void {
                $filename = Storage::disk('private')->exists($data['csv_file']);
                if ($filename) {
                    dispatch(
                        new ImportProducts($data['csv_file'], 'private')
                    );
                }
            })
            ->form([
                FileUpload::make('csv_file')->rules([
                    'required', 'mimes:csv'
                ])->disk('private')
                    ->helperText(__('All user will receive an email after import has fininshed'))

            ])->icon('heroicon-o-upload');
    }


    /**
     * Button to export csv file
     *
     * @return ButtonAction
     */
    protected function getExportToCSVAction(): ButtonAction
    {
        return
            ButtonAction::make('export')
            ->label(__('Export to CSV'))
            ->action(fn () => $this->export())
            ->requiresConfirmation()
            ->color('primary')
            ->icon('heroicon-o-download');
    }

    /**
     * Starts export of csv file
     *
     * @return void
     */
    protected function export(): void
    {

        dispatch(new ExportProducts($this->getAllTableRecordKeys(), [auth()->user()->email]));
    }
}