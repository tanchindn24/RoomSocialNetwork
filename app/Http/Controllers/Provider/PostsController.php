<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\PostCategories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostsController extends Controller
{
    public function postsCreate() :View
    {
        $listCategory = PostCategories::where('status', 1)
            ->get();

        return view('provider.posts.create', compact('listCategory'));
    }

    public function postsStore(Request $request)
    {

        $name_image = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time(). '.' .$file->getClientOriginalExtension();
            $path = $file->move(public_path('images/posts'), $name);
            $name_image = $name;
        } else {
            $name_image = "no_image.jpg";
        }

        $storePost = new Posts();

        $storePost->user_id = Auth::user()->id;
        $storePost->category_id = $request->category;
        $storePost->title = $request->title;
        $storePost->slug = Str::slug($request->title);
        $storePost->description = $request->description;
        $storePost->address = $request->address;
        $storePost->area = $request->area;
        $storePost->view = 0;
        $storePost->status = 2;
        $storePost->image = $name_image;

        $storePost->save();

        return redirect('/provider/posts')
            ->with('notification', 'Post created successfully, please wait for admin approval');
    }
}
