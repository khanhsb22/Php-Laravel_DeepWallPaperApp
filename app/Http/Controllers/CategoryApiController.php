<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class CategoryApiController extends Controller
{
    function getAllCategory() {
        $arrays = array();
        //$arrays["categorys"] = array();

        $cate = Category::all();
        foreach ($cate as $data) {
            $item = array(
                "id" => $data->id,
                "name" => $data->name
            );
            array_push($arrays, $item);
        }

        echo json_encode($arrays);
    }
}
