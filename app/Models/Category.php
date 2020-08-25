<?php

namespace App\Models;

use App\Company\Traits\CompanyTrait;
use App\Company\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use CompanyTrait;

    protected $fillable = ['name', 'url', 'description'];

    public function products(){
        $this->belongsToMany(Product::class);
    }
}
