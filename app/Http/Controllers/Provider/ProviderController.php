<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProviderController extends Controller
{
    public function index() :View
    {
        return view('provider.index');
    }

    public function posts() :View
    {
        return view('provider.posts.index');
    }
}
