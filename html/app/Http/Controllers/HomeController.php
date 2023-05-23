<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
class HomeController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $genres = Genre::all();
        if (Auth::check())
        {
            $user = User::IdEq(Auth::id())->first();
            if ($user->role_id == 1)
            {
                $message=$user->name;
                return view('Home.admin');
            }elseif ($user->role_id == 2)
            {
                return view('Home.owner');
            }else
            $message=$user->name."さん、ようこそ";
            return view('Home.index',compact('message'));
        }else
        {
            $message="ようこそ、Rese へ";
            $shops = Shop::with('area')->with('genre')->get();
            return view('Home.index',compact('message','areas','genres','shops'));
        }
    }
}
