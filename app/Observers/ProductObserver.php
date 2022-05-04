<?php

namespace App\Observers;

use App\Mail\ProductUpdates;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{



    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {

        $url = route('filament.resources.products.view', ['record' => $product]);
        Mail::to(User::pluck('email')->toArray())
            ->send(new ProductUpdates(__('Product with id :id has been created.', ['id' => $product->id]), __('To check the new product <a href=":url">click here</a>.', ['url' => $url])));
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $oldImageUrl = $product->getOriginal('image_url');
        if ($oldImageUrl != $product->image_url) {
            // Check if image has really been uploaded and delete it
            if (Storage::get('public/' . $product->image_url)) {
                Storage::delete('public/' . $oldImageUrl);
            }
            // Revert changes
            else {
                $product->image_url = $oldImageUrl;
                $product->save();
            }
        }

        $url = route('filament.resources.products.view', ['record' => $product]);
        Mail::to(User::pluck('email')->toArray())
            ->send(new ProductUpdates(__('Product with id :id has been updated.', ['id' => $product->id]), __('To check the changes <a href=":url">click here</a>.', ['url' => $url])));
    }


    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        Storage::delete('public/' . $product->getOriginal('image_url'));

        Mail::to(User::pluck('email')->toArray())
            ->send(new ProductUpdates(__('Product with id :id has been deleted from the system. ', ['id' => $product->id]), __('Product Name: :name.', ['name' => $product->getOriginal('name')])));
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}