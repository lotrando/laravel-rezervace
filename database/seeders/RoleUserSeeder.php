<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin role default fir Administrator
        DB::insert('insert into role_user (role_id, user_id) values (1, 1)');

        // Bělica René Admin role attach
        DB::insert('insert into role_user (role_id, user_id) values (1, 2)');

        // Hracký Jaroslav Admin role attach
        DB::insert('insert into role_user (role_id, user_id) values (1, 3)');

        // Černíková Marcela Admin role attach
        DB::insert('insert into role_user (role_id, user_id) values (1, 4)');

        // Volanská Lydie  Admin role attach
        DB::insert('insert into role_user (role_id, user_id) values (1, 5)');

        // Klika Miroslav User role attach
        DB::insert('insert into role_user (role_id, user_id) values (2, 6)');

        /*
        // Other random roles for users

        $roles = Role::all();
        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach($roles->random(1)->pluck('id'));
        });

        */
    }
}
