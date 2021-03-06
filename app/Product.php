<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function categories() {
        return $this->belongsToMany('\App\Category');
    }
}
