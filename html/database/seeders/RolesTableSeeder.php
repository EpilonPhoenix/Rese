<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'role' => 'Administrator',
        ];
        DB::table('roles')->insert($param);
        $param = [
            'role' => 'ShopOwner',
        ];
        DB::table('roles')->insert($param);
        $param = [
            'role' => 'User',
        ];
        DB::table('roles')->insert($param);
    }
}
