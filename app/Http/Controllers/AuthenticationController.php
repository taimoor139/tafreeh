<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function registrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            $user = User::create($request->all());

            return back()->with('success', 'Registration Completed sucessfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($request->except('_token'))) {
                return redirect('/home')->with('success', 'Login successfully');
            } else {

                return back()->with('error', 'Credentials not matched');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
