<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        $user = User::IdEq(Auth::id())->first();
        if ($user->role_id == 1)
        {
            return view('Home.admin');
        }elseif ($user->role_id == 2)
        {
            return view('Home.owner');
        }elseif ($user->role_id == 3)
        {
            return view('Home.index');
        }
    }
}
