<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MUA Authentication
    |--------------------------------------------------------------------------
    */
    public function login_dashboard_mua()
    {
        return view('dashboard.MUA.login');
    }

    public function auth_dashboard_mua(Request $request)
    {
    
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role_name;
            $class = Auth::user()->class ?? "";
            toast("You've Successfully Logged \nIn as $role $class!", 'success');
            
            return redirect()
                ->route('dashboard.mua.index')
                ->with([
                    'success' =>
                        'You are logging in dashboard successfully!',
                ]);
        } else {
            toast("You've failed to login!", 'error');
            return back()->withErrors([
                'username' => 'Username is not available.',
                'password' => 'Password is wrong.',
            ]);
        }
    }

    public function logout_dashboard_mua()
    {
        Session::flush();
        Auth::logout();
        toast("You've Successfully Logged out!", 'success');
        return redirect('/MUAVol9/dashboard/login')->with([
            'logout' => true,
        ]);
    }
}
