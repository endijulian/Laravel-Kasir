<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => '1',
            'name' => 'Nasi Goreng Jawa',
            'slug' => 'nasi-goreng-jawa',
            'price' => '50000'
        ]);

        Product::create([
            'category_id' => '1',
            'name' => 'Mie Goreng Jawa',
            'slug' => 'mie-goreng-jawa',
            'price' => '45000'
        ]);

        Product::create([
            'category_id' => '2',
            'name' => 'Es Teh Manis',
            'slug' => 'es-teh-manis',
            'price' => '5000'
        ]);

        Product::create([
            'category_id' => '2',
            'name' => 'Es Jeruk',
            'slug' => 'es-jeruk',
            'price' => '5000'
        ]);

        Product::create([
            'category_id' => '3',
            'name' => 'Adidas',
            'slug' => 'adidas',
            'price' => '5000'
        ]);
    }
}
