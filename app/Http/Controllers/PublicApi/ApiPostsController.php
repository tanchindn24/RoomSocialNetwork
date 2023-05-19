<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use App\Models\PostCategories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class ApiPostsController extends Controller
{
    public function getPosts(): \Illuminate\Http\JsonResponse
    {

        $providers = User::where('roles', 2)
            ->where('status', 1)
            ->get();

        $categories = PostCategories::where('status', 1)
            ->get();

        $publicPosts = Posts::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $posts = $publicPosts->map(function ($post) use ($providers, $categories) {
            $user = $providers->find($post->user_id);
            $category = $categories->find($post->category_id);
            return [
                'id' => $post->id,
                'user' => $user ? $user->name : "Thông tin ẩn",
                'category' => $category ? $category->name : "Thông tin ẩn",
                'title' => $post->title,
                'slug' => $post->slug,
                'description' => $post->description,
                'address' => $post->address,
                'area' => $post->area,
                'view' => $post->view,
                'status' => $post->status,
                'image' => $post->image,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ];
        });

        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);
    }

    public function getDetailPost($id): \Illuminate\Http\JsonResponse
    {

        $providers = User::where('roles', 2)
            ->where('status', 1)
            ->get();

        $categories = PostCategories::where('status', 1)
            ->get();

        $detailPost = Posts::where('status', 1)
            ->where('id', $id)
            ->orderBy('created_at', 'DESC')
            ->first();

        if ($detailPost) {
            ++$detailPost->view;
            $detailPost->save();

            $user = $providers->find($detailPost->user_id);
            $category = $categories->find($detailPost->category_id);

            $post = [
                'id' => $detailPost->id,
                'user' => $user ? $user->name : "Thông tin ẩn",
                'category' => $category ? $category->name : "Thông tin ẩn",
                'title' => $detailPost->title,
                'slug' => $detailPost->slug,
                'description' => $detailPost->description,
                'address' => $detailPost->address,
                'area' => $detailPost->area,
                'view' => $detailPost->view,
                'status' => $detailPost->status,
                'image' => $detailPost->image,
                'created_at' => $detailPost->created_at,
                'updated_at' => $detailPost->updated_at,
            ];

            return response()->json([
                'success' => true,
                'post' => $post
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No find post'
        ]);
    }
}
