<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    function logoutAccount() {
        Session::forget('login');
        return redirect("login")->with(['fail' => "false"]);
    }
}
