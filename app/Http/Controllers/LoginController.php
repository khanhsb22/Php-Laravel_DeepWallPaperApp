<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    function moveToHomePage(Request $req)
    {
        if (isset($_POST['submit'])) {
            $username = $req->username;
            $password = $req->password;

            $checkLogin = DB::table('login')
                ->where(['username' => $username, 'password' => $password])->get();

            if (count($checkLogin) > 0) {
                Session::put('login', "true");
                $data = Category::all();
                return redirect("home")->with(['categorys' => $data]);
            } else {
                return view("login", ["fail" => "true"]);
            }
        }
    }

    function showLoginPage()
    {
        return view("login", ["fail" => "false"]);
    }
}
