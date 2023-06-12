<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index($id)
    {
        return view('Checkin.index',compact('id'));
    }
}
