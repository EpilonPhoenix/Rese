<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ReviewController extends Controller
{
    public function index($id)
    {
        $review = new Review;

        $shop = Shop::Id($id)->first();
        return view('Review.index', compact('review', 'shop'));
    }
    public function edit(Request $request)
    {

        $review = Review::Id($request->id)->first();
        $shop = Shop::Id($request->shop_id)->first();
        return view('Review.index', compact('review', 'shop'));
    }
    public function delete(Request $request)
    {
        Review::Id($request->id)->first()->delete();;
        return redirect(url('/reserve', [$request->shop_id]));
    }
    public function post(ReviewRequest $request)
    {

        $review = Review::firstOrNew(
            ['shop_id' => $request->shop_id, 'user_id' => Auth::id()]
        );
        $form = $request->all();
        unset($form['_token']);
        unset($form['picture']);
        $form['user_id'] = Auth::id();
        if ($request->picture != Null) {
            $dir = 'public/review/' . $form['shop_id'] . '/' . Auth::id();
            Storage::deleteDirectory($dir);
            $file_name = $request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs($dir, $file_name);
            $form["picture"] = $file_name;
        }
        $review->fill($form)->save();
        return redirect('/review/thankyou');
    }
    public function thankyou()
    {
        return view('Review.thankyou');
    }
}
