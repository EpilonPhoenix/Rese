<?php

namespace App\Http\Controllers;
class RegistrationController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }

    public function thankyou()
    {
        return view('Register.thankyou');
    }

}
