<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        User::create([
            'name' => 'Demo',
            'email' => 'demo@demo.com',
            'password'=> Hash::make('password'),
            'isAdmin' => '1'
        ]);
    }
}
