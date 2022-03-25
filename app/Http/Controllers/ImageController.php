<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    function addImageFile(Request $req)
    {
        $success_count = 0;

        if (isset($_POST['add'])) {
            // For multi file
            $files = $req->file('allFiles');
            $value_select_option = $req->categorys;

            if ($req->hasFile('allFiles')) {
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    // Save image to storage folder (public/image_app)
                    Storage::disk('public')->put($file->getFilename() . '.' . $extension, File::get($file));

                    $img = new Image();
                    $img->mime = $file->getClientMimeType();
                    $img->filename = $file->getFilename() . '.' . $extension;
                    $img->category_name = $value_select_option;
                    $img->isPremium = "";

                    if ($img->save()) {
                        $success_count++;
                    } else {
                        $success_count--;
                    }
                }
                if ($success_count == count($files)) {
                    $data = Category::all();
                    return view("addImages", ["data" => $data, "success" => "true"]);
                } else {
                    echo "Failed !";
                }
            }
        }

        if (isset($_POST['continue'])) {
            return redirect("addImages");
        }

        if (isset($_POST['homepage'])) {
            return redirect("home");
        }
    }

    function addPremiumImageFile(Request $req)
    {
        $success_count = 0;

        if (isset($_POST['add'])) {
            // For multi file
            $files = $req->file('allFiles');
            $value_select_option = $req->categorys;

            if ($req->hasFile('allFiles')) {
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    // Save image to storage folder (public/image_app)
                    Storage::disk('public')->put($file->getFilename() . '.' . $extension, File::get($file));

                    $img = new Image();
                    $img->mime = $file->getClientMimeType();
                    $img->filename = $file->getFilename() . '.' . $extension;
                    $img->category_name = $value_select_option;
                    $img->isPremium = "true";

                    if ($img->save()) {
                        $success_count++;
                    } else {
                        $success_count--;
                    }
                }
                if ($success_count == count($files)) {
                    $data = Category::all();
                    return view("addPremiumImages", ["data" => $data, "success" => "true"]);
                } else {
                    echo "Failed !";
                }
            }
        }

        if (isset($_POST['continue'])) {
            return redirect("addPremiumImages");
        }

        if (isset($_POST['homepage'])) {
            return redirect("home");
        }
    }

    function showData()
    {
        if (Session::get('login') == 'true') {
            $data = Category::all();
            return view("addImages", ["data" => $data, "success" => "false"]);
        } else {
            return view("login", ["fail" => "false"]);
        }
    }

    function showDataPremium()
    {
        if (Session::get('login') == 'true') {
            $data = Category::all();
            return view("addPremiumImages", ["data" => $data, "success" => "false"]);
        } else {
            return view("login", ["fail" => "false"]);
        }
    }

    function showImagesOfCategory($name)
    {
        if (Session::get('login') == 'true') {
            $result = DB::table('images')
                ->where('category_name', '=', $name)
                ->where('isPremium', '=', "")
                ->get();

            $data = json_decode($result, true);

            return view("showImagesOfCategory", ["data" => $data, "name" => $name]);
        } else {
            return view("login", ["fail" => "false"]);
        }
    }

    function showPremiumImagesOfCategory($name)
    {
        if (Session::get('login') == 'true') {
            $result = DB::table('images')
                ->where('category_name', '=', $name)
                ->where('isPremium', '=', 'true')
                ->get();

            $data = json_decode($result, true);

            return view("showPremiumImagesOfCategory", ["data" => $data, "name" => $name]);
        } else {
            return view("login", ["fail" => "false"]);
        }
    }

    function deleteItems($myJSON)
    {
        if (Session::get('login') == 'true') {
            $data = json_decode($myJSON, true);
            $arraySize = count($data);
            $count = 0;
            foreach ($data as $item) {
                $element = $item['id'];
                $img = Image::find($element);
                if ($img->delete()) {
                    $count++;
                }
            }
            if ($count == $arraySize) {
                // After delete, please press back on browser and refresh page to update items
                echo '<script language="javascript">';
                echo 'alert("Delete items success.")';
                echo '</script>';
            }
        } else {
            return view("login", ["fail" => "false"]);
        }
    }

    function deletePremiumItems($myJSON)
    {
        if (Session::get('login') == 'true') {
            $data = json_decode($myJSON, true);
            $arraySize = count($data);
            $count = 0;
            foreach ($data as $item) {
                $element = $item['id'];
                $img = Image::find($element);
                if ($img->delete()) {
                    $count++;
                }
            }
            if ($count == $arraySize) {
                echo '<script language="javascript">';
                echo 'alert("Delete items success.")';
                echo '</script>';
            }
        } else {
            return view("login", ["fail" => "false"]);
        }
    }
}
