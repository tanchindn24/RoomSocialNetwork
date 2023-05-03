<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Motelroom;
use App\Categories;

class PostsMotelroomController extends Controller
{

    public function postsAll() {
        $posts = Motelroom::orderBy('id', 'DESC')->get();
        foreach ($posts as $post) {
            //get user of post
            $post->user;
            //get comment count
            $post['count_comment'] = count($post->comments);
            //get bookmask self
            $post['selfLike'] = false;
            //get bookmask count
            // $post['bookmaskCount'] = count($post->bookmask);
            

        }
        return response()->json([
            'success' => true,
            'posts' => $posts,
        ]);
    }

    public function postsCreate(Request $request) {

        $post = new Motelroom();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->address = $request->address;
        $post->price = $request->price;
        $post->area = $request->area;
        $post->phone = $request->phone;
        $post->description = $request->description;
        
        //ham random String
        function randomStringABCD($length = 4) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        // reaname code room and add code room
        $coderoom = mt_rand(0,999) . "-" . randomStringABCD();
        $post->coderoom = $coderoom;

        // check photo post motelroom
        if($request->images != '') {
            
            $images = "phongtro-" . rand(0,999) . "-" . randomStringABCD() . '.jpg';
            file_put_contents('public/uploads/images/'.$images,base64_decode($request->images));
            $post->images = $images;

        }

        $post->save();
        $post->user;

        return response()->json([
            'success' => true,
            'post' => $post,
            'message' => 'posted'
            
        ]);
    }

    public function postsUpdate(Request $request) {
        $post = Motelroom::find($request->id);

        // kiem tra id user & motelroom user_id
        if (Auth::user()->id != $post->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $post->title = $request->title;
        $post->address = $request->address;
        $post->price = $request->price;
        $post->area = $request->area;

        $post->update();
        return response()->json([
            'success' => true,
            'message' => 'post edit success'
        ]);

    }

    public function postsDelete(Request $request) {

        $post = Motelroom::find($request->id);
        // kiem tra id user & xoa motelroom dung voi user_id
        if (Auth::user()->id != $post->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        if ($post->images != '') {
            Storage::delete('public/uploads/images/'.$post->images);
        }
        $post->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'motelroom delete success'
        ]);

    }

    public function myPost() {
        $posts = Motelroom::where('user_id', Auth::user())->orderBy('id', 'DESC')->get();
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'posts' => $posts,
            'user' => $user
        ]);
    }
}
