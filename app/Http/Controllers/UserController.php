<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Scenario;
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

    public function addScenario(Request $request){
        //validate request
           $this->validate($request, [
                'Scenario_title' => 'required',
                'Scenario_description' => 'required'
            ]);
            return Scenario::create([
                'Scenario_title' => $request->Scenario_title,
                'Scenario_description' => $request->Scenario_description

            ]);
    }

    public function editScenario(Request $request){
        //validate request
        $this->validate($request, [
            'Scenario_title' => 'required',
            'Scenario_description' => 'required',
        ]);
        return Scenario::where('id', $request->id)->update([
            'Scenario_title' => $request->Scenario_title,
            'Scenario_description' => $request->Scenario_description,
        ]);
    }

    public function deleteScenario(Request $request){
        //validate request
           $this->validate($request, [
                'id' => 'required',
            ]);
            return Scenario::where('id', $request->id)->delete();
    }

    public function getScenarios(){
         return Scenario::orderBy('id','asc')->get();
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
