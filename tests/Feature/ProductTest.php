<?php


use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Models\Product;

use function Pest\Livewire\livewire;

it('can create', function () {
    $product = Product::factory()->create();

    livewire(CreateProduct::class)
        ->set('data.name', $product->name)
        ->set('data.barcode', $product->barcode)
        ->set('data.brand_id', $product->brand_id)
        ->set('data.price', $product->price)
        ->set('data.image_url', $product->image_url)
        ->call('create');

    $this->assertDatabaseHas(Product::class, [
        'name' => $product->name,
        'barcode' => $product->barcode,
        'brand_id' => $product->brand_id,
        'price' => $product->price,
        'image_url' => $product->image_url,

    ]);
});


it('can validate input required', function () {

    livewire(CreateProduct::class)
        ->set('data.name', null)
        ->set('data.barcode',  null)
        ->set('data.brand_id', null)
        ->set('data.price', null)
        ->set('data.image_url', null)
        ->call('create')
        ->assertHasErrors(
            [
                'data.name' => 'required',
                'data.barcode' => 'required',
                'data.price' => 'required',

            ]
        );
});


it('can validate input brand invalid', function () {
    $product = Product::factory()->create();

    livewire(CreateProduct::class)
        ->set('data.name', $product->name)
        ->set('data.barcode',  $product->barcode)
        ->set('data.brand_id', 234234)
        ->set('data.price', null)
        ->set('data.image_url', null)
        ->call('create')
        ->assertHasErrors(
            [
                'data.brand_id' => 'exists:brands,id',
            ]
        );
});