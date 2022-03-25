<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    function getAllCategoryName() {
        if (Session::get('login') == 'true') {
            $data = Category::all();
            return view("home", ["categorys" => $data]);
        } else {
            return view("login", ["fail" => "false"]);
        }
        
    }

    function addNewCategory(Request $req) {
        if (isset($_POST['add'])) {

            $ct = new Category();
            $ct->name = $req->name;
            
            // Save category success will auto redirect to home page
            if ($ct->save()) {
                return redirect("home");
            } else {
                echo "Insert category fail !";
            }
        }
    }

    function createNewCategory() {
        if (Session::get('login') == 'true') {
            return view("createNewCategory");
        } else {
            return view("login", ["fail" => "false"]);
        }
    }

}
