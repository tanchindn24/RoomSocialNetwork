<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }
    public function dangnhap()
    {
        return view('home.dangnhap');
    }
    public function dangky()
    {
        return view('home.dangky');
    }
    public function postdangky(Request $request)
    {
        return view('home.dangky');
    }
}
