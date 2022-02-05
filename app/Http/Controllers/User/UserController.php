<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function home(){
        return view('user.home');
    }
    public function login(){
        return view('auth.login');
    }
    /////////////////////////////
    public function register(){
        return view('auth.register');
    }
    //////////////////////////////
    public function create(Request $request)
    {
        // make validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);
        $user = new User();
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        if( $save ){
            return redirect()->back()->with('success', 'You Are Now Register Successfully');
        }
        else{
             return redirect()->back()->with('error', 'Something went wrong, Failed to register');
         }
    }
    /////////////////////////////////////////////
    public function check(UserLoginRequest $request)
    {
        // make validation

        $creds = $request->only('email', 'password');
        if( Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('error', 'Email or Password is not correct');
        }        
    }
    ////////////////////////
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
