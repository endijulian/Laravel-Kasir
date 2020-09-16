<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = ['id', 'order_id', 'product_id', 'product_name', 'product_price', 'qty', 'subtotal'];

    public function item($order)
    {
        return $this->where('order_id', $order)->count();
    }
}
