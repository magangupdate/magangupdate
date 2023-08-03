<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function firstJob()
    {
        return view('jobs.first-job');
    }

    public function secondJob()
    {
        return view('jobs.second-job');
    }

    public function thirdJob()
    {
        return view('jobs.third-job');
    }

    public function fourthJob()
    {
        return view('jobs.fourth-job');
    }

    public function fifthJob()
    {
        return view('jobs.fifth-job');
    }
}
