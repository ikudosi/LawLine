<?php

use \Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\User::class)->times(5)->create();
    }
}