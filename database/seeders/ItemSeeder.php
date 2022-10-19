<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Kolo L1',
            'description' => 'E-kolo Focus Jarifa vel.L',
            'type'  => 'kolo',
            'color' => '#3269a8',
            'serial_number' => '363385023',
            'price' => 100,
        ]);

        DB::table('items')->insert([
            'name' => 'Kolo M1',
            'description' => 'E-kolo Focus Jarifa vel.M',
            'type'  => 'kolo',
            'color' => '#d9096d',
            'serial_number' => '363383028',
            'price' => 100,
        ]);        

        DB::table('items')->insert([
            'name' => 'Box B1',
            'description' => 'Autobox THULE č.1',
            'type'  => 'box',
            'color' => '#76b336',
            'serial_number' => 'Nemá',
            'price' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Box B2',
            'description' => 'Autobox HAPRO č.2',
            'type'  => 'box',
            'color' => '#9532a8',
            'serial_number' => 'Nemá',
            'price' => 0,
        ]);
    }
}
