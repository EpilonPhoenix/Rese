<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class ShopmanageController extends Controller
{
    public function index($id)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shop=Shop::with(['area','genre'])->Id($id)->first();
        if (Auth::id() == $shop->user_id)
        {
            return view('Shopmanage.index',compact('shop','areas','genres'));
        }else {
            return redirect('login');
        }
    }

    public function post(ShopRequest $request)
    {
        if ($request->id !=Null)
        {
            $shop = Shop::Id($request->id)->first();
            $form = $request->all();
            unset($form['_token']);
            $shop->fill($form)->save();
            return redirect(url('/shopmanage',[$shop->id]));
        }else{
            $shop = new Reserve;
            $form = $request->all();
            unset($form['_token']);
            $form["id"]= Uuid::uuid7()->toString();
            $shop->fill($form)->save();
            return redirect(url('/shopmanage',[$shop->id]));
        }
    }
}
