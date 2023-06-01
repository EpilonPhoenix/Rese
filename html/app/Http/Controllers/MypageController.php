<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Favorite;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $user = User::IdEq(Auth::id())->first();
        if ($user->role_id == 1)
        {
            $users = User::RoleIq(3)->get();
            $owners = User::RoleIq(2)->get();
            return $users;
        }elseif ($user->role_id == 2)
        {
            $shops = Shop::with(['area','genre','favorite'])->Owner($user->id)->get();
            return view('Mypage.owner',compact('user','shops'));
        }else
        $reserves = Reserve::with('shop')->User($user->id)->get();
        $favoriteShops = Favorite::with('shop','shop.area','shop.genre')->get();
        return view('Mypage.index',compact('user','reserves','favoriteShops'));
    }
}
