<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'name' => 'Cafe Endi',
            'address' => 'Cipondoh',
            'city' => 'Tangerang',
            'phone' => '085779811290'
        ]);
    }
}
