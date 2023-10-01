<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outages')->insert([
            'name' => 'IM1103512',
            'wilaya' => 'Alger',
            'image' => 'assets/outageImg/img1.PNG',
        ]);
        DB::table('outages')->insert([
            'name' => 'IM1103513',
            'wilaya' => 'Blida',
            'image' => 'assets/outageImg/img2.PNG',
        ]);
        DB::table('outages')->insert([
            'name' => 'IM1103514',
            'wilaya' => 'Tipaza',
            'image' => 'assets/outageImg/img3.PNG',
        ]);
        DB::table('outages')->insert([
            'name' => 'IM1103515',
            'wilaya' => 'Boumerdas',
            'image' => 'assets/outageImg/img4.PNG',
        ]);
    }
}
