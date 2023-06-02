<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ToShopOwner(Request $request)
    {
        $user = User::find($request->id)->first();
        $form=$user['role_id'] =2;
        $user->fill($form)->save();
        return redirect('/mypage');
    }
    public function ToUser(Request $request)
    {
        $user = User::find($request->id)->first();
        $form=$user['role_id'] =3;
        $user->fill($form)->save();
        return redirect('/mypage');
    }
    public function delete(Request $request)
    {
        User::find($request->id)->first()->delete();;
        return redirect('/mypage');
    }
}
