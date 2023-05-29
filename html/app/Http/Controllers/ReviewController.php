<?php

namespace App\Http\Controllers;
use App\Models\Reserve;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($id)
    {
        $reserve =Reserve::with('shop')->Id($id)->first();
        return view('Review.index',compact('reserve'));
    }
    public function post(Request $request)
    {
        // return $request;
        $review = new Review;
        $form = $request->all();
        unset($form['_token']);
        $review->fill($form)->save();
        return redirect('/review/thankyou');
    }
    public function thankyou()
    {
        return view('Review.thankyou');
    }


}
