<?php

namespace App\Filament\Resources\RoleResource\RelationManagers;

use App\Filament\Resources\PermissionResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class PermissionsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return PermissionResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return PermissionResource::table($table);
    }
}