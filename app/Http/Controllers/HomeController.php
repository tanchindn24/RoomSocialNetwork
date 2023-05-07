<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() :View
    {
        $getProvider = User::where('roles', 2)
            ->where('status', 1)->get();

        $getCategory = PostCategories::where('status', 1)
            ->get();

        $getPost = Posts::where('status', 1)
            ->get();

        return view('home', [
            'post' => $getPost,
            'category' => $getCategory,
            'provider' => $getProvider,
        ]);
    }

    public function listPosts() :View
    {
        return view('home.list_posts');
    }

    public function detailPosts() :View
    {
        return view('home.detail_posts');
    }

}
