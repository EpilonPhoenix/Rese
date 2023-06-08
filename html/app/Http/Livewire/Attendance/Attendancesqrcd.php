<?php

namespace App\Http\Livewire\Attendance;
use Illuminate\Http\Request;
use Livewire\Component;

class Attendancesqrcd extends Component
{
    public $post;
    public $message = 'Hello World!';
    public function render($id)
    {
        
        return view('Livewire.Attendance.Attendancesqrcd');
    }
    public function mount($post)
    {
        $this->post =$post;
    }

    public function attend($request)
    {
        // テーブルに登録する
        session()->flash('message', $request->id );
    }
}
