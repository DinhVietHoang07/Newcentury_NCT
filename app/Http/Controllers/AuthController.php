<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            //Đăng nhập thành công
            return redirect()->intended('/admin/dashboard');
        }
        //Đăng nhập thất bại
        return redirect()->back()->withInput()->withErrors(['login_error' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('admin.login.register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //Đăng nhập người dùng sau khi đăng ký
       

        //Chuyển hướng sau khi đăng ký thành công
        return redirect('/login')->with('success', 'Đăng ký thành công!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
