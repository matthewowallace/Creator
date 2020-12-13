<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request){

        $data = $request->validate([
            'post_id' => 'required',
        ]);
        $comments = Comment::where('video_id', $data['post_id'])
        ->orderBy('id', 'desc')
        ->get();
        return response($comments, 200);

    }

    public function store(Request $request){
        $data = $request->validate([
            'body' =>'required|min:3',
            'post_id' => 'required',
        ]);

        $comment = Comment::create([
            'body' => $data['body'],
            'user_id' => Auth::user()->id,
            'is_published' => 1,
            'post_id' => $data['post_id']
        ]);

        return response($comment, 201);
    }
}
