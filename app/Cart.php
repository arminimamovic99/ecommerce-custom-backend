<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
class Cart extends Model
{
    public function products() {
        $this->hasMany('App\Products');
    }
}
