<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MBaiviet;
use Illuminate\Http\Request;

class Baiviet extends Controller
{
    function getposts() {
        $posts = MBaiviet::where('trang_thai', 1)->get();
        return response()->json($posts);
    }
}
