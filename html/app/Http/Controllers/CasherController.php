<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CasherController extends Controller
{
    public function index()
    {
        return view('Casher.index');
    }
    public function post(Request $request)
    {
        try {
            $user = User::IdEq(Auth::id())->first();
            $stripeCharge =$user->charge(
            100, $request->paymentMethodId
            );
        } catch (Exception $e) {
            return $request;
        }
        return view('Casher.thankyou');
    }

}
