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

    public function postsStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $name = time(). '-' .Str::slug($request->title). '-'. rand(0,99). '.' .$file->getClientOriginalExtension();
                $path = $file->move(public_path('images/posts'), $name);
                $images[] = $name;
            }
            $images_json = json_encode($images);
        } else {
            $images_json = "no-image.jpg";
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
        $storePost->image = $images_json;

        $storePost->save();

        return redirect('/provider/posts')
            ->with('notification', 'Post created successfully, please wait for admin approval');
    }

    public function postsEdit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $editPost = Posts::find($id);

        $listCategory = PostCategories::where('status', 1)
            ->get();

        return view('provider.posts.edit', compact('editPost', 'listCategory'));
    }

    public function postsDelete($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $deletePost = Posts::findOrFail($id);
        $deletePost->delete();

        return redirect('provider/posts')
            ->with('notification', 'Post deleted successfully');
    }

    public function postHide($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $hidePost = Posts::findOrFail($id);
        $hidePost->status = 2;
        $hidePost->save();

        return redirect('provider/posts')
            ->with('notification', 'Post hide successfully');
    }

    public function postShow($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $showPost = Posts::findOrFail($id);
        $showPost->status = 1;
        $showPost->save();

        return redirect('provider/posts')
            ->with('notification', 'Post show successfully');
    }
}
