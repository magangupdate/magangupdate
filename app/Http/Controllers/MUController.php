<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MUController extends Controller
{

    private $articles;
    private $jobs;
    private $article;
    private $accounts;

    public function dashboard()
    {
        return view('dashboard.MU.index');
    }

    public function articles()
    {
        $articles = collect(Article::all());
        return view('dashboard.MU.articles', [
            'articles' => $articles,
            'articlesCount' => sizeof($articles),
        ]);
    }

    public function jobs()
    {
        return view('dashboard.MU.jobs');
    }

    public function login()
    {
        return view('dashboard.MU.login');
    }

    public function auth(Request $request)
    {
    
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role_name;
            toast("You've Successfully Logged \nIn as $role!", 'success');
            
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

    public function logout()
    {
        Session::flush();
        Auth::logout();
        toast("You've Successfully Logged out!", 'success');
        return redirect('/MUAVol9/dashboard/login')->with([
            'logout' => true,
        ]);
    }

    public function uploadImage(Request $request)
    {
        $imgpath = request()
            ->file('file')
            ->store('uploads', 'public');
        return response()->json(['location' => url("../../storage/$imgpath")]);
    }
}
