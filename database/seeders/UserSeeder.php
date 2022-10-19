<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'pernum'    => 'admin',
            'user_name' => 'Administrator',
            'email' => 'admin@khn.cz',
            'date_birth' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'pernum'    => '60303',
            'user_name' => 'Bělica René, Bc.',
            'email' => 'belica@khn.cz',
            'date_birth' => '1972-12-19',
            'email_verified_at' => now(),
            'password' => Hash::make('Rene2022*'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'pernum'    => '61314',
            'user_name' => 'Hracký Jaroslav',
            'email' => 'hracky@khn.cz',
            'date_birth' => '1988-07-19',
            'email_verified_at' => now(),
            'password' => Hash::make('Jaryn2022*'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'pernum'    => '60611',
            'user_name' => 'Čierníková Marcela',
            'email' => 'ciernikova@khn.cz',
            'date_birth' => '1966-11-28',
            'email_verified_at' => now(),
            'password' => Hash::make('Marcela2022*'),
            'remember_token' => Str::random(10),
        ]);


        DB::table('users')->insert([
            'pernum'    => '64416',
            'user_name' => 'Volanská Lydie',
            'email' => 'vedouci.uklidu@khn.cz',
            'date_birth' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('Lydie2022*'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'pernum'    => '61625',
            'user_name' => 'Klika Miroslav',
            'email' => 'klika@khn.cz',
            'date_birth' => '1977-01-30',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
