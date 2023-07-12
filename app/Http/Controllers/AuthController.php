<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginFill(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Invalid Credentials');
        return redirect('/login');
    }

    public function register() {

        $role = Role::get();
        return view('reg', ['role' => $role]);
    }

    public function registerFill(Request $request) {
        $request->password = bcrypt($request->password);
        $user = User::create($request->all());
        return redirect('/login');
    }

    public function logout(Request $request) {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/login');
    }
}
