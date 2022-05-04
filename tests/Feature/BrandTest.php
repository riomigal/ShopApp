<?php

use App\Filament\Resources\BrandResource\Pages\CreateBrand;
use App\Models\Brand;
use function Pest\Livewire\livewire;


it('can create', function () {
    $brand = Brand::factory()->create();

    livewire(CreateBrand::class)
        ->set('data.name', $brand->name)

        ->call('create');

    $this->assertDatabaseHas(Brand::class, [
        'name' => $brand->name,

    ]);
});


it('can validate input required', function () {

    livewire(CreateBrand::class)
        ->set('data.name', null)
        ->call('create')
        ->assertHasErrors(
            [
                'data.name' => 'required',
            ]
        );
});