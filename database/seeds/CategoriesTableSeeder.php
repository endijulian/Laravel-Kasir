<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'makanan',
            'slug' => 'makanan',
            'description' => 'Makanan Basah',
        ]);

        Category::create([
            'name' => 'minuman',
            'slug' => 'minuman',
            'description' => 'Minuman beralkohol',
        ]);
    }
}
