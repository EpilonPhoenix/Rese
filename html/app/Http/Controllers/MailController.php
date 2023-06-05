<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Support\Facades\Mail;
use App\Mail\NoticeMail;

class MailController extends Controller
{
    public function index()
    {
        $user = User::IdEq(Auth::id())->first();
        if ($user->role_id == 2)
        {
            return view('mail.owner',compact('user'));
        }else
        return redirect('/mypage');
    }

    public function send($id, Request $request)
    {
        $message =$request->contents;
        $favorites= Favorite::with(['user'])->ShopId($id);
        $shop = Shop::with(['area','genre'])->Id($id)->first();
        $title=(string)$shop->name."からのお知らせメールです";
        foreach ($favorites as $favorite)
        {
            $name = $favorite->User->name;
            $email = $favorite->User->email;
    
            Mail::send(new NoticeMail($title,$message,$name, $email));
        }

        return redirect('/mypage');
        }

}
