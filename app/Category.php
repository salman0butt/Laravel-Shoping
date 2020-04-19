<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    protected $guarded = [];


    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function products() {
        return $this->belongsToMany('\App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function childrens() {
    return $this->belongsToMany(Category::class,'category_parent','category_id','parent_id');
    }
}
