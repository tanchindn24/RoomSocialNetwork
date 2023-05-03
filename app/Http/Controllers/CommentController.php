<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Comment;

class CommentController extends Controller
{
    public function create(Request $request) {
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->room_id = $request->id;
        $comment->content = $request->comment;
        $now = new DateTime;
        $comment->created_at = $now;
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'đã bình luận'
        ]);
    }

    public function update(Request $request) {
        $comment = Comment::find($request->id);
        // check if user is editing his own comment
        if ($comment->id != Auth::user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'token het han'
            ]);
        }
        
        $comment->content = $request->comment;
        $comment->update();

        return response()->json([
            'success' => true,
            'message' => 'da chinh sua binh luan'

        ]);
        
    }

    public function comments(Request $request) {
        $comments = Comment::where('room_id', $request->id)->get();
        // show user of each comment
        foreach ($comments as $coment) {
            $coment->user;
        }
        return response()->json([
            'success' => true,
            'content' => $comments
        ]);
    }
}
