<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ToShopOwner(Request $request)
    {
        $user = User::Id($request->id)->first();
        $form = $user;
        $form['role_id'] = 2;
        $form = $form->toArray();
        $user->fill($form)->save();
        return redirect('/mypage');
    }
    public function ToUser(Request $request)
    {
        $user = User::Id($request->id)->first();
        $form = $user;
        $form['role_id'] = 3;
        $form = $form->toArray();
        $user->fill($form)->save();
        return redirect('/mypage');
    }
    public function delete(Request $request)
    {
        User::find($request->id)->first()->delete();;
        return redirect('/mypage');
    }
}
