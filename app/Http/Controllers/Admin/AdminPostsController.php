<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;

class AdminPostsController extends Controller
{
    public function postInactive($id)
    {
        $inactivePost = Posts::find($id);
        $inactivePost->status = 2;
        $inactivePost->save();
        return redirect('/admin/post-list')
            ->with('notification', 'Posts are hidden');
    }

    public function postActive($id)
    {
        $activePost = Posts::find($id);

        $activePost->status = 1;
        $activePost->save();
        return redirect('/admin/post-list')
            ->with('notification', 'Posts are approved');
    }

    public function postDelete($id)
    {
        $deletePost = Posts::findOrFail($id);
        $deletePost->delete();

        return redirect('/admin/post-list')
            ->with('notification', 'Posts are deleted');
    }
}
