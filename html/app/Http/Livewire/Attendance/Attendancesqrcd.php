<?php

namespace App\Http\Livewire\Attendance;
use App\Models\Reserve;
use Livewire\Component;

class Attendancesqrcd extends Component
{
    public function render()
    {
        return view('livewire.attendance.attendancesqrcd')->layout('layouts.guest');
    }
    public function attend(Reserve $reserve)
    {
        // テーブルに登録する
        dd($reserve);
    }
}
