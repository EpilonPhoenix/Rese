<?php

namespace App\Http\Controllers;
use App\Models\Reserve;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($id)
    {
        $reserve =Reserve::Id($id)->first();
        return view('Review.index',compact('reserve'));
    }
}
