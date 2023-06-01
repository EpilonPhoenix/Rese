<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReservationtatusesTableSeeder extends Seeder
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
        DB::table('reservationtatuses')->insert($param);
        $param = [
            'status' => 'Booked',
        ];
        DB::table('reservationtatuses')->insert($param);
        $param = [
            'status' => 'Checkind',
        ];
        DB::table('reservationtatuses')->insert($param);
        $param = [
            'status' => 'Paid',
        ];
        DB::table('reservationtatuses')->insert($param);
        $param = [
            'status' => 'Evaluated',
        ];
        DB::table('reservationtatuses')->insert($param);
    }
}
