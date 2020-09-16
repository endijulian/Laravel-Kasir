<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['id', 'name', 'address', 'city', 'phone'];
}
