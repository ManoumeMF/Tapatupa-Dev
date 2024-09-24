<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->roleId == '2') {
                return redirect()->intended('admin');
            } elseif ($user->roleId == '3') {
                return redirect()->intended('user');
            }
        }
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                //$user = Auth::user();
                $userRole = Auth::user()->roles->roleName;

                //if ($dataUser[0]['roleName'] == 'Admin') {
                if ($userRole == 'Admin') {
                    //return redirect()->intended('admin');
                    return redirect()->route('Dashboard.index');
                } elseif ($userRole == 'User') {
                    return redirect()->intended('user');
                }elseif ($userRole == 'Super Admin') {
                    return redirect()->route('Dashboard.index');
                }
                return redirect()->intended('/');
            }

        return redirect('login')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}