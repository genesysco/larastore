<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function register() {
        $user = Auth::user();
        if(auth()->check())
        {
            if($user->is_admin)
                return view('Users/register');
            else
                return redirect('/userHome');
        }
        else
            return view('Users/register');
    }



    public function insertUser(Request $request){

        $request->validate([
            "name" => 'required|min:3',
            "email" => 'required|email|unique:users',
            "username" => 'required|min:3|unique:users|string',
            "password" => 'required|min:6|max:10|confirmed'
        ]);

        $insertion = User::create([
            "name" => $request->name ,
            "email" => $request->email ,
            "username" => $request->username ,
            "password" => Hash::make($request->password) ,
        ]);

        if(!$insertion)
            return redirect()->back()->with('error',"Insert failed! try again please...");

        return redirect('/login')->with('success', "Register was successful !");
    }



    public function checkEmail($email)
    {
        $checkedEmail = User::where('email',$email)->first();

        if($checkedEmail)
            return false;
        else
            return true;
    }



    public function checkUsername($username) {
        $checkUser = User::where('username',$username)->first();

        if($checkUser)
            return false;
        else
            return true;
    }



    public function login(){
        $user = Auth::user();

        if(auth()->check())
        {
            if($user->is_admin)
                return redirect('/administrator');
            else
                return redirect('/userHome');
        }
        else
            return view('Users/login');
    }



    public function signIn(Request $request){

        $creds = $request->validate([
            "email" => 'required|exists:users',
            "password" => 'required|min:6'
        ]);

        $admin = User::where('email',$request->email)->first();
        $isAdmin = $admin['is_admin'];

        

        if(Auth::attempt($creds))
        {
            $request->session()->regenerate();
            if($isAdmin)
                return redirect('/administrator');
            else
                return redirect('/userHome');
        }
        else
        {
            return redirect()->back()->with('error', "Wrong Credentials!");
        }
    }



    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function userHome(){
        $user = Auth::user();

        if(auth()->check())
        {
            if($user->is_admin)
                return redirect('/administrator');
            else
                return view('Users/index');
        }
        else
            return view('Users/login');
    }
}