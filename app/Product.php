<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'cat_fk', 'id');
    }
}
