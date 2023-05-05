<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PostsController extends Controller
{
    public function postsCreate() :View
    {
        return view('provider.posts.add');
    }
}
