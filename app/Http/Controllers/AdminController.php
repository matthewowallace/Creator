<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\TagsResource;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller

{

    public function index(Request $request)
    {

        // if (!Auth::check() && $request->path() != 'login') {
        //     return redirect('/login');
        // }

        // if (!Auth::check() && $request->path() == 'login') {
        //     return view('welcome');
        // }

        // $user = Auth::user();
        // if ($user->role_id == 'User') {
        //     return redirect('/dashboard');
        // }
        // if ($request->path() == 'login') {
        //     return redirect('/admin');
        // }
         return view('welcome');

    }


    public function addTag(Request $request){
        //validate request
           $this->validate($request, [
                'tagName' => 'required'
            ]);
            return Tag::create([
                'tagName' => $request->tagName
            ]);
    }

    public function editTag(Request $request){
        //validate request
           $this->validate($request, [
                'tagName' => 'required',
                'id' => 'required',
            ]);
            return Tag::where('id', $request->id)->update([
                'tagName' => $request->tagName
            ]);
    }

    public function deleteTag(Request $request){
        //validate request
           $this->validate($request, [
                'id' => 'required',
            ]);
            return Tag::where('id', $request->id)->delete();
    }

    public function getTag(){
         return Tag::orderBy('id','asc')->get();
    }


    public function AllTags(){
        return TagsResource::collection(Tag::all());
    }


    public function upload(Request $request){
        $this->validate($request, [
            'file' => 'required|image:mimes:jpeg,jpg,png'
        ]);
        $picName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'),$picName);
        return $picName;
    }

    public function deleteImage(Request $request){
        $fileName = $request->imageName;
        $this->deleteFileFromServer($fileName);
        return 'done';
    }

    public function deleteFileFromServer($fileName){
        $filePath = public_path().'/uploads/'.$fileName;
        if(file_exists($fileName)){
            @unlink($filePath);
        }
        return;
    }

    public function addCategory(Request $request){
         //validate request
         $this->validate($request, [
            'categoryName' => 'required',
            'iconImage' => 'required'
        ]);
        return Category::create([
            'categoryName' => $request->categoryName,
            'iconImage' => $request->iconImage
        ]);
    }

    public function getCategory(){
        return Category::orderBy('id','asc')->get();
   }

    public function editCategory(Request $request){
        //validate request
        $this->validate($request, [
            'categoryName' => 'required',
            'iconImage' => 'required'
        ]);
        return Category::where('id', $request->id)->update([
            'categoryName' => $request->categoryName,
            'iconImage' => $request->iconImage
        ]);
    }

    public function deleteCategory(Request $request){
          $this->deleteFileFromServer($request->iconImage);
           //validate request
           $this->validate($request, [
            'id' => 'required',
        ]);
        return Category::where('id', $request->id)->delete();
    }


    public function addAdmin(Request $request){
         //validate request
         $this->validate($request, [
            'name' => 'required',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
            'role_id' => 'required'
        ]);
        $password = bcrypt($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role_id' => $request->role_id
        ]);
        return $user;

    }

    public function getAdminUsers(){
        return User::where('role_id','!=','User')->get();
   }

   public function editAdminUsers(Request $request){
        //validate request
        $this->validate($request, [
            'name' => 'required',
            'email' => "bail|required|email|unique:users,email,$request->id",
            'role_id' => 'required',
            'password' => 'min:6',
        ]);

        $data = [
            'name' => $request ->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ];

        if($request->password){
            $password = bcrypt($request->password);
            $data['password'] = $password;
        }
        $user = User::where('id', $request->id)->update($data);
        return $user;
    }

    public function deleteAdminUsers(Request $request){
        //validate request
           $this->validate($request, [
                'id' => 'required',
            ]);
            return User::where('id', $request->id)->delete();
    }

    public function addRole(Request $request){
        //validate request
           $this->validate($request, [
                'roleName' => 'required'
            ]);
            return Role::create([
                'roleName' => $request->roleName
            ]);
    }

    public function getRoles(){
        return Role::orderBy('id','asc')->get();
   }


   public function editRole(Request $request){
    //validate request
       $this->validate($request, [
            'roleName' => 'required',
            'id' => 'required',
        ]);
        return Role::where('id', $request->id)->update([
            'roleName' => $request->roleName
        ]);
}

    public function deleteRole(Request $request){
        //validate request
        $this->validate($request, [
                'id' => 'required',
            ]);
            return Role::where('id', $request->id)->delete();
    }
}
