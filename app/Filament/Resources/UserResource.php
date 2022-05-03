<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Nickname'))
                    ->required()
                    ->minLength(5)
                    ->maxLength(255)
                    ->helperText(__('Enter the nickname of the user. E.g. JDoe.')),

                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->unique()
                    ->required()
                    ->maxLength(255)
                    ->helperText(__('Email address must be unique.')),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->maxLength(50)
                    ->rules(
                        ['max:50', 'min:8']
                    )
                    ->helperText(__('Password must have at least 8 characters and max 50 characters.')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
                /* Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()->sortable(), */
                Tables\Columns\TextColumn::make('created_at')->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->sortable()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}/view')
        ];
    }
}