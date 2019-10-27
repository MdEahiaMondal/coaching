<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;

class UserRegisterController extends Controller
{
    public function showRegisterForm()
    {
        if (auth()->user()->role == 'admin'){
            return view('backend.users.register');
        }else{
            return redirect('/home');
        }

    }


    public function userSave(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $users = User::all();
        return view('backend.users.user-list',['users'=>$users]);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'mobile' => ['required', 'string', 'max:15','min:9', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'mobile' => $data['mobile'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function userList()
    {
        if (auth()->user()->role == 'admin'){
            $users = User::all();
            return view('backend.users.user-list', compact('users'));
        }else{
            return redirect('/home');
        }

    }

    public function userProfile($id)
    {
       $user = User::find($id);
       return view('backend.users.profile',['user'=>$user]);
    }

    public function changeInfo($id)
    {
        $user = User::find($id);
        return view('backend.users.change-info')->with(['user'=>$user]);
    }

    public function updateInfo(Request $request, $id)
    {

        $request->validate([
            'mobile' => 'required|unique:users,mobile,'.$id.',id',
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|unique:users,email,'.$id.'id',
        ]);


        $user = User::find($id);
        $user->update($request->all());


        return redirect()->route('user-profile',['user'=>$id])->with('success','Profile Info Updated Successfylly Done!');
    }



    public function changePhoto($id)
    {
        $user = User::find($id);
        return view('backend.users.change-photo', compact('user'));
    }

    public function updatePhoto(Request $request, $id)
    {

        $user = User::find($id);
        $file = $request->file('avatar');
        if ($file){
            if ($user->avatar != ''){
                if (file_exists('backend/profile-image/'.$user->avatar)){
                    unlink('backend/profile-image/'.$user->avatar);
                }
            }

            $getFileExtension = $file->getClientOriginalExtension();
            $setImageName = rand(). '.' .$getFileExtension;
            $dir = "backend/profile-image/".$setImageName;
            Image::make($file)->resize('400', '400')->save($dir,'100');
            $user->avatar = $setImageName;
            $user->save();
        }
        $user->save();



        /*// manualy image upload without any pakeg and old image deleted
        $file = $request->file('avatar');
        $imageName = $file->getClientOriginalName();
        $dir = 'backend/profile-image/';
        $randName = rand();
        $setImageName = $randName.$imageName;
        $file->move($dir,$setImageName);
        $user->avatar = $setImageName;
        $user->save();*/

        return redirect()->route('user-profile', ['user'=>$id])->with('success', 'Profile Image Uploaded Successfylly Done!!');
    }


    public function changePassword($id)
    {
        $user = User::find($id);
        return view('backend.users.change-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:8|max:15',
        ]);
        $user = User::find($id);
        $currentPassword = $request->currentPassword;
        $new_password = $request->new_password;

        if (Hash::check($currentPassword,$user->password)){
            $user->password = Hash::make($new_password);
            $user->save();
            return redirect()->route('user-profile', ['user'=>$id])->with('success', 'User password Uploaded Successfylly Done!!');
        }else{
            return back()->with('error', 'Current password does not match !!');
        }

    }


}
