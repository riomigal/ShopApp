<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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