<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Department deeder
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'department_code' => '401',
            'department_name' => 'Interní oddělení',
        ]);

        DB::table('departments')->insert([
            'department_code' => '402',
            'department_name' => 'Endokrinologická ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '403',
            'department_name' => 'Příjmová interní ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '404',
            'department_name' => 'Gastroenterologická ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '405',
            'department_name' => 'Odborné interní ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '407',
            'department_name' => 'Neurologické oddělení',
        ]);

        DB::table('departments')->insert([
            'department_code' => '408',
            'department_name' => 'Neurologická ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '410',
            'department_name' => 'Odělení chirurgie páteře',
        ]);

        DB::table('departments')->insert([
            'department_code' => '411',
            'department_name' => 'JIP oddělení chirurgie páteře a ortopedie',
        ]);

        DB::table('departments')->insert([
            'department_code' => '412',
            'department_name' => 'Ambulance chirurgie páteře',
        ]);

        DB::table('departments')->insert([
            'department_code' => '413',
            'department_name' => 'Rehabilitační oddělení',
        ]);

        DB::table('departments')->insert([
            'department_code' => '414',
            'department_name' => 'Rehabilitační ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '415',
            'department_name' => 'Oddělení pracovního lékařství',
        ]);

        DB::table('departments')->insert([
            'department_code' => '417',
            'department_name' => 'OKB',
        ]);

        DB::table('departments')->insert([
            'department_code' => '418',
            'department_name' => 'RDG',
        ]);

        DB::table('departments')->insert([
            'department_code' => '419',
            'department_name' => 'Operační sály',
        ]);

        DB::table('departments')->insert([
            'department_code' => '420',
            'department_name' => 'Ředitelství',
        ]);

        DB::table('departments')->insert([
            'department_code' => '421',
            'department_name' => 'Stravovací provoz - kantýna',
        ]);

        DB::table('departments')->insert([
            'department_code' => '422',
            'department_name' => 'Úklid',
        ]);

        DB::table('departments')->insert([
            'department_code' => '424',
            'department_name' => 'Anesteziologická ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '425',
            'department_name' => 'Diabetologická ambulance',
        ]);

        DB::table('departments')->insert([
            'department_code' => '426',
            'department_name' => 'Lékárna KHN',
        ]);

        DB::table('departments')->insert([
            'department_code' => '427',
            'department_name' => 'Mezioborová JIP',
        ]);

        DB::table('departments')->insert([
            'department_code' => '428',
            'department_name' => 'Provozní úsek',
        ]);

        DB::table('departments')->insert([
            'department_code' => '429',
            'department_name' => 'Údržba',
        ]);

        DB::table('departments')->insert([
            'department_code' => '432',
            'department_name' => 'Ambulance infuzní terapie',
        ]);

        DB::table('departments')->insert([
            'department_code' => '433',
            'department_name' => 'Mamologická poradna',
        ]);

        DB::table('departments')->insert([
            'department_code' => '434',
            'department_name' => 'Ortopedické oddělení',
        ]);

        DB::table('departments')->insert([
            'department_code' => '436',
            'department_name' => 'Lékárna KHN v Ráji',
        ]);

        DB::table('departments')->insert([
            'department_code' => '437',
            'department_name' => 'Oddělení následné péče',
        ]);
    }
}
