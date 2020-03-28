<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    //
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
