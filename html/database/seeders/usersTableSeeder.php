<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $param = [
            'roles_id' => 0,
            'name' => 'Administrator',
            'email' => 'admin@admin',
            'password' => Hash::make('ReseMaster'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'roles_id' => 1,
            'name' => 'SampleOwner',
            'email' => 'owner@admin',
            'password' => Hash::make('OwnerPass'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'roles_id' => 2,
            'name' => 'SampleUser',
            'email' => 'user@admin',
            'password' => Hash::make('password'),
        ];
        DB::table('users')->insert($param);
    }
}
