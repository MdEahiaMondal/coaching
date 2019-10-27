<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


}
