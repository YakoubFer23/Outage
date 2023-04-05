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
            'name' => 'Abderrahmane',
            'email' => 'Abarouche',
            'password' => Hash::make('Abarouche'),
            'role_as' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Yasmine',
            'email' => 'Yazirou',
            'password' => Hash::make('Yazirou'),
            'role_as' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Islem',
            'email' => 'Bislem',
            'password' => Hash::make('Bislem'),
            'role_as' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Mohammed',
            'email' => 'Kmohammed',
            'password' => Hash::make('Kmohammed'),
            'role_as' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'CC',
            'email' => 'CC',
            'password' => Hash::make('ccwaves'),
            'role_as' => '0',
        ]);

	
       
    }
}
