<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addPost(Request $request){
        //validate request
           $this->validate($request, [
                'title' => 'required',
                'postImage' => 'required',
                'post_description' => 'required'
            ]);
            return Post::create([
                'title' => $request->title,
                'postImage' => $request->postImage,
                'post_description' => $request->post_description

            ]);
    }

    public function editPost(Request $request){
        //validate request
        $this->validate($request, [
            'title' => 'required',
            'postImage' => 'required',
            'post_description' => 'required',
        ]);
        return Post::where('id', $request->id)->update([
            'title' => $request->title,
            'postImage' => $request->postImage,
            'post_description' => $request->post_description,
        ]);
    }

    public function deletePost(Request $request){
        //validate request
           $this->validate($request, [
                'id' => 'required',
            ]);
            return Post::where('id', $request->id)->delete();
    }

    public function getPosts(){
         return Post::orderBy('id','asc')->get();
    }



    public function upload(Request $request){
        $this->validate($request, [
            'file' => 'required|image:mimes:jpeg,jpg,png'
        ]);
        $picName = time().'.'.$request->file->extension();
        $request->file->move(public_path('Userpost'),$picName);
        return $picName;
    }

    public function deleteImage(Request $request){
        $fileName = $request->imageName;
        $this->deleteFileFromServer($fileName);
        return 'done';
    }

    public function deleteFileFromServer($fileName){
        $filePath = public_path().'/Userpost/'.$fileName;
        if(file_exists($fileName)){
            @unlink($filePath);
        }
        return;
    }


}
