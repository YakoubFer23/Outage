<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sup',
            'email' => 'Sup',
            'password' => Hash::make('password'),
            'role_as' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'CC',
            'email' => 'CC',
            'password' => Hash::make('password'),
            'role_as' => '0',
        ]);
       
    }
}
