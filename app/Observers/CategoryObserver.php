<?php

namespace App\Observers;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the categories "creating" event.
     *
     * @param  \App\Models\Category  $plans
     * @return void
     */
    public function creating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }

    /**
     * Handle the category$categorys "updating" event.
     *
     * @param  \App\Models\Categories $categorys  $categorys
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }

    /**
     * Handle the categories "deleted" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function deleted(Category $categories)
    {
        //
    }

    /**
     * Handle the categories "restored" event.
     *
     * @param  \App\Models\Category  $categories
     * @return void
     */
    public function restored(Category $categories)
    {
        //
    }

    /**
     * Handle the categories "force deleted" event.
     *
     * @param  \App\Models\Category  $categories
     * @return void
     */
    public function forceDeleted(Category $categories)
    {
        //
    }
}
