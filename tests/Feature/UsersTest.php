<?php

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Models\User;

use function Pest\Livewire\livewire;

it('can create', function () {
    $user = User::factory()->create();

    livewire(CreateUser::class)
        ->set('data.name', $user->name)
        ->set('data.email', $user->email)
        ->set('data.password', $user->password)
        ->call('create');

    $this->assertDatabaseHas(User::class, [
        'name' => $user->name,
        'email' => $user->email,
    ]);
});


it('can validate input required', function () {

    livewire(CreateUser::class)
        ->set('data.name', null)
        ->set('data.email', null)
        ->set('data.password', null)
        ->call('create')
        ->assertHasErrors(
            [
                'data.name' => 'required',
                'data.email' => 'required',
                'data.password' => 'required',
            ]
        );
});


it('can validate input email invalid', function () {
    $user = User::factory()->create();

    livewire(CreateUser::class)
        ->set('data.email', 'saver')
        ->set('data.email', $user->email)
        ->set('data.email', $user->password)
        ->call('create')
        ->assertHasErrors(
            [
                'data.email' => 'email',
            ]
        );
});