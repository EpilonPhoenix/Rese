<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Favorite;


class FavoriteController extends Controller
{
    public function post(Request $request)
    {
        $favorite=Favorite::shop($request->shop_id)->first();
        // dd($favorite != Null);
        if ($favorite != Null)
        {
            $favorite->delete();
        }else{
            $favorite = new Favorite;
            $form = $request->all();
            unset($form['_token']);
            $form["user_id"]= Auth::id();
            $favorite->fill($form)->save();
        }
        return redirect()->back();
    }
}
