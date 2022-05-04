<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Brand;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Product Name'))
                    ->required()
                    ->maxLength(255)
                    ->helperText(__('Enter the product name.')),
                Forms\Components\TextInput::make('barcode')
                    ->label(__('Barcode'))
                    ->required()
                    ->numeric()
                    ->helperText(__('Enter the product barcode.')),
                BelongsToSelect::make('brand_id')->relationship('brand', 'name')
                    ->label(__('Brand'))
                    ->options(
                        Brand::pluck('name', 'id')->toArray()
                    )->helperText(__('Select a brand (for non local products), if a brand is not in the list it can be added afterwards or in the Brands section before.'))
                    ->rules(['nullable', 'exists:brands,id']),
                Forms\Components\TextInput::make('price')
                    ->label(__('Price'))
                    ->numeric()
                    ->required()
                    ->helperText(__('Insert the price of the product. E.g.: 9.99')),
                Forms\Components\FileUpload::make('image_url')
                    ->image()
                    ->label(__('Product Image'))
                    ->rules(['nullable', 'mimes:png,jpg,jpeg|max:2048', 'file'])
                    ->helperText(__('Upload a product image.')),
                /*  Forms\Components\DateTimePicker::make('date_added')

                    ->required(), */
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label(__('ID'))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->label(__('Name'))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('barcode')->label(__('Barcode'))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('brand.name')->label(__('Brand'))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price')->label(__('Price'))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('image_url')->label(__('Image'))->sortable(),
                Tables\Columns\TextColumn::make('date_added')->label(__('Date added'))->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('date_updated')->label(__('Date updated'))->sortable()
                    ->dateTime(),

            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'view' => Pages\ViewProduct::route('/{record}/view')

        ];
    }
}