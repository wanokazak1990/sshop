<?php

namespace App\Observers;

use App\Models\Parameter;
use Str;

class ParameterObserver
{
    /**
     * Handle the parameter "created" event.
     *
     * @param  \App\Parameter  $parameter
     * @return void
     */
    public function creating(Parameter $parameter)
    {
        $parameter->slug = Str::slug($parameter->name);
    }

    /**
     * Handle the parameter "updated" event.
     *
     * @param  \App\Parameter  $parameter
     * @return void
     */
    public function updated(Parameter $description)
    {
        //
    }

    /**
     * Handle the parameter "deleted" event.
     *
     * @param  \App\Parameter  $parameter
     * @return void
     */
    public function deleted(Parameter $description)
    {
        //
    }

    /**
     * Handle the parameter "restored" event.
     *
     * @param  \App\Parameter  $parameter
     * @return void
     */
    public function restored(Parameter $description)
    {
        //
    }

    /**
     * Handle the parameter "force deleted" event.
     *
     * @param  \App\Parameter  $parameter
     * @return void
     */
    public function forceDeleted(Parameter $description)
    {
        //
    }
}
