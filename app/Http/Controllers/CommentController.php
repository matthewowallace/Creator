<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getComments(){
        return Comment::orderBy('id','asc')->get();
   }



   public function addComment(Request $request){
    //validate request
       $this->validate($request, [
            'Comment_description' => 'required'
        ]);
        return Comment::create([
            'Comment_description' => $request->Comment_description

        ]);
   }

   public function editComment(Request $request){
    //validate request
    $this->validate($request, [
        'Comment_description' => 'required',
    ]);
    return Comment::where('id', $request->id)->update([
        'Comment_description' => $request->Comment_description,
    ]);
   }

    public function deletePost(Request $request){
        //validate request
        $this->validate($request, [
                'id' => 'required',
            ]);
            return Comment::where('id', $request->id)->delete();
    }

}
