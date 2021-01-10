<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('login.login');
    }
    public function getRegister(){
        return view('login.register');
    }
    public function postLogin(Request $request){
        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect()->back();
        }
        return redirect()->route('dashboard');
        // dd(Auth::attempt(['email'=>$request->email,'password'=>$request->password]));
    }
    public function postRegister(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        return redirect()->route('users.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('sign-in');
    }
    

}
