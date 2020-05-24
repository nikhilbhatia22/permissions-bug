<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    public function products() {
        auth()->user()->roles;
        return $this->hasMany(Product::class, 'cat_fk', 'id');
    }
}
