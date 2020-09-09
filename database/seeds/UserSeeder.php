<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('families')->insert([
            'name' => 'Delang',
            'owner_id' => 1
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'firstname' => 'Mattias',
            'lastname' => 'Delang',
            'email' => 'mattiasdelang@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'active' => 1,
            'family_id' => 1
        ]);
    }
}
