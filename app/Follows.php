<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    //

    protected $fillable = ['following_id', 'followed_id'];

    protected $table = 'follows';
}
