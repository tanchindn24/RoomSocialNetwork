<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategories;
use App\Models\Posts;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    protected AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index() :View
    {
        return view('admin.index');
    }

    public function providerList() :View
    {
        $provider = $this->adminService
            ->getProviderPagination(request('page', 1), 4);

        return view('admin.users.list_provider', compact('provider'));
    }

    public function seekerList() :View
    {
        $seeker = $this->adminService
            ->getSeekerPagination(request('page', 1), 6);

        return view('admin.users.list_seeker', compact('seeker'));
    }

    public function postList() :View
    {
        $listPost = Posts::all();

        return view('admin.posts.list_post', compact('listPost'));
    }

    public function categoryList() :View
    {
        $categories = PostCategories::all();

        return view('admin.categories.list_category', compact('categories'));
    }

    public function categoryListAdd() :View
    {
        return view('admin.categories.add_category');
    }
}
