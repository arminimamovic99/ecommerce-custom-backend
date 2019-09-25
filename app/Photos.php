<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    public function products()
    {
        $this->belongsTo('App\Products');
    }
}
