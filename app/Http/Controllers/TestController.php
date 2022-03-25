<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    function test() {
        $path = public_path().'/storage/'.'phph56cQL.jpg';
        return response()->file($path);        
    }
}
