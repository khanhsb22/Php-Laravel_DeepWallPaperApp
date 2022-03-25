<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageApiController extends Controller
{
    function getImageOfCategory($name) {
        $result = DB::table('images')->where('category_name', '=', $name)
        ->where('isPremium', '=', "")->get();

        $arrays = array();
        
        foreach ($result as $data) {
            $item = array(
                "id" => $data->id,
                "category_name" => $data->category_name,
                "filename" => asset('image_app/'. $data->filename),
                "isPremium" => $data->isPremium
            );
            array_push($arrays, $item);
        }
        echo json_encode($arrays);
    }

    function getPremiumImageOfCategory($name) {
        $result = DB::table('images')->where('category_name', '=', $name)
        ->where('isPremium', '=', "true")->get();

        $arrays = array();
        
        foreach ($result as $data) {
            $item = array(
                "id" => $data->id,
                "category_name" => $data->category_name,
                "filename" => asset('image_app/'. $data->filename),
                "isPremium" => $data->isPremium
            );
            array_push($arrays, $item);
        }
        echo json_encode($arrays);
    }

    function getAllImage() {
        $result = Image::all()->where('isPremium', '=', "");
        
        $arrays = array();

        foreach ($result as $data) {
            $item = array(
                "id" => $data->id,
                "category_name" => $data->category_name,
                "filename" => asset('image_app/'. $data->filename),
                "isPremium" => $data->isPremium
            );
            array_push($arrays, $item);
        }
        echo json_encode($arrays);
    }

    function getAllPremiumImages() {
        $result = Image::all();
        
        $arrays = array();

        foreach ($result as $data) {
            $item = array(
                "id" => $data->id,
                "category_name" => $data->category_name,
                "filename" => asset('image_app/'. $data->filename),
                "isPremium" => $data->isPremium
            );
            array_push($arrays, $item);
        }
        echo json_encode($arrays);
    }

    
}
