<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        $users = \App\User::all();
        if (count($users) > 0){
            return view('backend.users.login');
        }else{
            $user = new User();
            $user->name = "Admin";
            $user->role = 'admin';
            $user->email = 'admin@gmail.com';
            $user->mobile = '01521414629';
            $user->password = Hash::make('01521414629');
            $user->save();
            return view('backend.users.login');
        }
        /* return view('auth.login');*/
    }



    public function username()
    {
        return 'mobile';
        /* return 'email';*/
    }


    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
