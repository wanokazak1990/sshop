<?php

namespace App\Observers;

use App\Models\Category;
use Str;

class CategoryObserver
{
    /**
     * Handle the Category "saving" event.
     *
     * @param  \App\Category  $Category
     * @return void
     */
    public function saving(Category $category)
    {
        $category->slug = Str::slug($category->name);
        $category->parent_id = request()->parent_id ? request()->parent_id : 0;
        $category->live = request()->live ? 1 : 0;
    }

    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Category  $Category
     * @return void
     */
    public function created(Category $Category)
    {
        //
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Category  $Category
     * @return void
     */
    public function updated(Category $Category)
    {
        //
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Category  $Category
     * @return void
     */
    public function deleted(Category $Category)
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Category  $Category
     * @return void
     */
    public function restored(Category $Category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Category  $Category
     * @return void
     */
    public function forceDeleted(Category $Category)
    {
        //
    }
}
