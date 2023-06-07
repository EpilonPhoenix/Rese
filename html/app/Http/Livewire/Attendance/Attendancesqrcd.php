<?php

namespace App\Http\Livewire\Attendance;
use Illuminate\Http\Request;
use Livewire\Component;

class Attendancesqrcd extends Component
{
    public function render($id)
    {
        return view('Livewire.Attendance.Attendancesqrcd')->layout('Layouts.guest');
    }
    public function attend(Request $request)
    {
        // テーブルに登録する
        session()->flash('message', $request->id );
    }
}
