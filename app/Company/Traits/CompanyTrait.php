<?php

namespace App\Company\Traits;
use App\Company\Observers\CompanyObserver;
use App\Company\Scopes\CompanyScope;

trait CompanyTrait{

    protected static function booted(){

        // parent::boot();

        static::observe(CompanyObserver::class);

        static::addGlobalScope(new CompanyScope);
    }

}
