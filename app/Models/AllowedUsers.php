<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllowedUsers extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'babe_id', 
        'uuid', 
    ];
    protected $dates = ['deleted_at'];
}
