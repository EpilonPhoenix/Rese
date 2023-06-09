<?php

namespace App\Http\Livewire;
use App\Models\Reserve;
use Livewire\Component;

class Checkin extends Component
{
    public function render()
    {
        return view('livewire.checkin')->layout('layouts.guest');
    }
    public function attend($reserve)
    {
        $reserve = Reserve::Id($reserve);
        $form=$reserve;
        $form['reservationstatuses_id'] =3;
        $form = $form->toArray();
        $reserve->fill($form)->save();
        session()->flash('message',  "チェックイン完了");
    }
}
