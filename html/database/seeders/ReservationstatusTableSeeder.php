<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReservationstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'status' => 'Reserved',
        ];
        DB::table('reservationstatus')->insert($param);
        $param = [
            'status' => 'Checkind',
        ];
        DB::table('reservationstatus')->insert($param);
        $param = [
            'status' => 'Paid',
        ];
        DB::table('reservationstatus')->insert($param);
        $param = [
            'status' => 'Evaluated',
        ];
        DB::table('reservationstatus')->insert($param);
    }
}
