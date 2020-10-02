<?php

namespace App\Observers;

use App\Models\Product;
use Str;

class ProductObserver
{
    /**
     * Handle the Product "saving" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function saving(Product $product)
    {
        $product->slug = Str::slug($product->name);
    }

    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function created(Product $Product)
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function updated(Product $Product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function deleted(Product $Product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function restored(Product $Product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function forceDeleted(Product $Product)
    {
        //
    }
}
