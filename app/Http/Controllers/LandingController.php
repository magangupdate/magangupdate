<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function jobs()
    {
        return view('jobs');
    }

    public function jobDetail()
    {
        return view('job-detail');
    }

    public function articles()
    {
        $articles = Article::all();
        return view('articles', [
            'articles' => $articles,
        ]);
    }

    public function muap()
    {
        return view('muap');
    }

    public function cvClinic()
    {
        return view('cv-clinic');
    }
}