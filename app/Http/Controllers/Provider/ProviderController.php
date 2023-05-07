<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProviderController extends Controller
{
    public function index() :View
    {
        return view('provider.index');
    }

    public function posts() :View
    {

        $listPost = Posts::where('user_id', Auth::id())
            ->get();

        return view('provider.posts.list', compact('listPost'));
    }
}
