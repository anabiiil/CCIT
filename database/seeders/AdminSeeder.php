<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // generate admin to start
        User::create([
            'name'=>'admin',
            'password' => bcrypt(11221122),
            'email'=>'info@laravel.com',
            'type' => 'admin'
        ]);


    }
}
