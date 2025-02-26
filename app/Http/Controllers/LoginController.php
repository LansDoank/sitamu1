<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login', ['title' => 'Login Form']);
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            $user = User::where('username', $request->input('username'))->first();
            $admin = User::where('username', $request->input('username'))->where('role_id', 1)->get();
            $receptionist = User::where('username', $request->input('username'))->where('role_id', 2)->get();
            $guest = User::where('username', $request->input('username'))->where('role_id', 3)->get();

            if (count($admin) > 0) {
                return redirect()->route('admin.dashboard');
            }

            if (count($receptionist) > 0) {
                return redirect()->route('admin.dashboard');
            }

            if (count($guest) > 0) {
                return redirect()->route('user.index');
            }     
        
        }
        return redirect()->route('login')->with('login', 'Username atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.index');
    }
}
