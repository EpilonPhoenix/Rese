<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reserve;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $user = User::IdEq(Auth::id())->first();
        $reserves = Reserve::with('shop')->User($user->id)->get();
        // dd($reserves);
        return view('Mypage.index',compact('user','reserves'));
    }
}
