<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
      
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->status == 0){
                Auth::logout();
                return back()->with('message','admin verified first');
            }
            return redirect()->intended('/');
        } else {
            // Authentication failed...
            return redirect('login')->with('error', 'Invalid credentials!');
        }
    }
}
