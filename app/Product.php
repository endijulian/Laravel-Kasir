<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'price','gambar'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function getGambarUrlAttribute($gambar)
    // {
    //     $gambar = 'uploads/gambarProduk/'. $gambar;

    //     return $gambar;
    // }
}
