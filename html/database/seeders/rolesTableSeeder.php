<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolesTableSeeder extends Seeder
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
        DB::table('user')->insert($param);
        $param = [
            'role' => 'ShopOwner',
        ];
        DB::table('user')->insert($param);
        $param = [
            'role' => 'User',
        ];
        DB::table('user')->insert($param);
    }
}
