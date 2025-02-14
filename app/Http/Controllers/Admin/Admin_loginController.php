<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin_loginController extends Controller
{
    public function showloginform()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = request(['phone', 'password']);
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('user');
            }
            else{
                return response()->json('you are not an admin');
            }
        }
        return redirect('login_form');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login_form');
    }
}
