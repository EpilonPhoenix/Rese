<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Ramsey\Uuid\Uuid;

class ReserveController extends Controller
{

    public function index($id)
    {
        $shop = Shop::with(['area', 'genre', 'review'])->Id($id)->first();
        $reserve = Null;
        $review = Review::Shop($id)->User(Auth::id())->first();

        return view('Reserve.index', compact('shop', 'reserve', 'review'));
    }
    public function edit($id, Request $request)
    {
        $shop = Shop::with(['area', 'genre', 'review'])->Id($id)->first();
        $reserve = Reserve::Id($request->id)->first();
        $review = Review::Shop($id)->User(Auth::id())->first();

        return view('Reserve.index', compact('shop', 'reserve', 'review'));
    }

    public function post(ReserveRequest $request)
    {
        if ($request->id != Null) {
            $reserve = Reserve::Id($request->id);
            $form = $request->all();
            unset($form['_token']);
            $form["user_id"] = Auth::id();
            $reserve->fill($form)->save();
            return redirect('/reserve/thankyou');
        } else {
            $reserve = new Reserve;
            $form = $request->all();
            unset($form['_token']);
            $form["id"] = Uuid::uuid7()->toString();
            $form["user_id"] = Auth::id();
            $reserve->fill($form)->save();
            return redirect('/reserve/thankyou');
        }
    }

    public function thankyou()
    {
        return view('Reserve.thankyou');
    }
    public function delete(Request $request)
    {
        Reserve::Id($request->id)->first()->delete();
        return redirect('/mypage');
    }
    public function book($shop_id)
    {
        $shop = Shop::with(['area', 'genre'])->Id($shop_id)->first();
        $reserves = Reserve::with(['user'])->Shop($shop_id)->get();
        return view('Reserve.booking', compact('shop', 'reserves'));
    }
    public function book_post($shop_id, Request $request)
    {
        $shop = Shop::with(['area', 'genre'])->Id($shop_id)->first();
        $reserves = Reserve::with(['user'])->Shop($shop_id)->Date($request->date)->get();
        return view('Reserve.booking', compact('shop', 'reserves'));
    }
}
