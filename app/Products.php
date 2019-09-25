<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'price',
        'brand',
        'sale',
        'description'
    ];

    public function cart() {
        $this->belongsTo('App\Cart');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function photos()
    {
        $this->hasOne('App\Photos');
    }
}
