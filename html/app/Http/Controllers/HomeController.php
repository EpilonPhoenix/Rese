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
        $valarr = array('area'=>Null,'genre'=>Null,'text'=>Null);
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
            $shops = Shop::with(['area','genre','favorite'])->get();
            // dd($shops);
            return view('Home.index',compact('user','areas','genres','shops','valarr'));
        }else
        {
            $shops = Shop::with(['area','genre'])->get();
            return view('Home.index',compact('areas','genres','shops','valarr'));
        }
    }
    public function post(Request $request)
    {
        $valarr = array('area'=>$request->area,'genre'=>$request->genre,'text'=>$request->search);
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
            $shops = Shop::with(['area','genre','favorite'])->Area($request->area)->Genre($request->genre)->Search($request->search)->get();
            return view('Home.index',compact('user','areas','genres','shops','valarr'));
        }else
        {
            $shops = Shop::with(['area','genre'])->Area($request->area)->Genre($request->genre)->Search($request->search)->get();
            return view('Home.index',compact('areas','genres','shops','valarr'));
        }
    }

}
