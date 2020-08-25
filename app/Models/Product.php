<?php

namespace App\Models;

use App\Company\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use CompanyTrait;

    protected $fillable = ['title','flag','price','description','image'];

    public function categories(){
        $this->belongsToMany(Category::class);
    }
}
