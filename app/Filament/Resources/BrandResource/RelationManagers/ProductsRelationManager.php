<?php

namespace App\Filament\Resources\BrandResource\RelationManagers;

use App\Filament\Resources\ProductResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ProductsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return ProductResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return ProductResource::table($table);
    }
}