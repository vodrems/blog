<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('tasks');
        } else {
            return redirect()->route('auth')->with('msg', 'Wrong email and/or password!');
        }
    }

    public function showRegForm()
    {
        return view('auth.register');
    }

    public function reg(Request $request)
    {
        $request['password'] = bcrypt($request['password']);
        User::create($request->except(['_token']));
        return response('registration page');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }


    public function hack()
    {
        Auth::loginUsingId(1);
    }

}
