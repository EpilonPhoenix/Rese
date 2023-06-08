<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Checkin extends Component
{
    public function render()
    {
        return view('livewire.checkin');
    }
    public function attend($id)
    {
        // テーブルに登録する
        dd($id);
    }
}
