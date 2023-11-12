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
            'name' => 'SuperAdmin',
            'email' => 'SuperAdmin',
            'password' => Hash::make('SuperAdmin'),
            'role_as' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin',
            'password' => Hash::make('Admin'),
            'role_as' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'CcWaves',
            'email' => 'CcWaves',
            'password' => Hash::make('CcWaves'),
            'role_as' => '1',
        ]);

	
       
    }
}
