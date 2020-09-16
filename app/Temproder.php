<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temproder extends Model
{
    protected $fillable = ['id', 'product_id', 'product_name', 'product_price', 'qty', 'subtotal'];
}
