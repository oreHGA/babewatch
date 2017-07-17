<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Babe extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'firstname', 
        'lastname', 
        'password',
        'uuid',
    ];
    // dont forget to encrypt the password when you're done
    protected $dates = ['deleted_at'];
}
