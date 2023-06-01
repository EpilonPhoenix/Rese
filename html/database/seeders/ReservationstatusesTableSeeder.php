<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReservationstatusesTableSeeder extends Seeder
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
        DB::table('reservationstatuses')->insert($param);
        $param = [
            'status' => 'Booked',
        ];
        DB::table('reservationstatuses')->insert($param);
        $param = [
            'status' => 'Checkind',
        ];
        DB::table('reservationstatuses')->insert($param);
        $param = [
            'status' => 'Paid',
        ];
        DB::table('reservationstatuses')->insert($param);
        $param = [
            'status' => 'Evaluated',
        ];
        DB::table('reservationstatuses')->insert($param);
    }
}
