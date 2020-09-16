<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kasir = User::create([
            'name' => 'Endi Julian',
            'email' => 'endijulian080798@gmail.com',
            'password' => bcrypt('julian1998'),
        ]);
        $kasir->assignRole('kasir');

        $owner = User::create([
            'name' => 'Alung',
            'email' => 'alung@gmail.com',
            'password' => bcrypt('alung'),
        ]);
        $owner->assignRole('owner');
    }
}
