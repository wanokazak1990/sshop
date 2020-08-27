<?php

namespace App\Observers;

use App\Models\Section;
use Str;

class SectionObserver
{
    /**
     * Handle the section "saving" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function saving(Section $section)
    {
        $section->slug = Str::slug($section->name);
        $section->parent_id = request()->parent_id ? request()->parent_id : 0;
        $section->live = request()->live ? 1 : 0;
    }

    /**
     * Handle the section "created" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function created(Section $section)
    {
        //
    }

    /**
     * Handle the section "updated" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function updated(Section $section)
    {
        //
    }

    /**
     * Handle the section "deleted" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function deleted(Section $section)
    {
        //
    }

    /**
     * Handle the section "restored" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function restored(Section $section)
    {
        //
    }

    /**
     * Handle the section "force deleted" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function forceDeleted(Section $section)
    {
        //
    }
}
