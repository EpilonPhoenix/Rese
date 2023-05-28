<?php

namespace App\Http\Controllers;
use App\Models\Reserve;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{

    public function index($id)
    {
        $shop = Shop::with('area')->with('genre')->Id($id)->first();
        return view('Reserve.index', compact('shop'));
    }

    public function post(ReserveRequest $request)
    {
        $reserve = new Reserve;
        $form = $request->all();
        unset($form['_token']);
        $form["user_id"]= Auth::id();
        $reserve->fill($form)->save();
        return redirect('/reserve/thankyou');
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
}
