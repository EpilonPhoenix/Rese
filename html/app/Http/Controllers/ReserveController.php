<?php

namespace App\Http\Controllers;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReserveController extends Controller
{

    public function index($id)
    {
        $shop = Shop::with('area')->with('genre')->Id($id)->first();
        return $shop;
    }

    public function thankyou()
    {
        return view('Reserve.thankyou');
    }
}
