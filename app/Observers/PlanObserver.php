<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plans "creating" event.
     *
     * @param  \App\Models\Plans  $plans
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plans "updating" event.
     *
     * @param  \App\Models\Plans  $plans
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plans "deleted" event.
     *
     * @param  \App\Models\Plans  $plans
     * @return void
     */
    public function deleted(Plan $plans)
    {
        //
    }

    /**
     * Handle the plans "restored" event.
     *
     * @param  \App\Models\Plan  $plans
     * @return void
     */
    public function restored(Plan $plans)
    {
        //
    }

    /**
     * Handle the plans "force deleted" event.
     *
     * @param  \App\Models\Plan  $plans
     * @return void
     */
    public function forceDeleted(Plan $plans)
    {
        //
    }
}
