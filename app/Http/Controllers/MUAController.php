<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Mentee;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MUAController extends Controller
{

    private $mentees;
    private $mentee;
    private $classes;
    private $class;
    private $mentors;
    private $accounts;

    public function index()
    {
        return view('MUA.index');
    }

    public function regist()
    {
        $this->classes = Classes::all();
        return view('MUA.close', [
            'classes' => $this->classes,
        ]);
    }

    public function dashboard() 
    {
        $firstClass = Mentee::groupBy('first_class')->select('first_class', DB::raw('count(*) as total'))->limit(1)
        ->orderBy('total', 'desc')->first();
        $secondClass = Mentee::groupBy('second_class')->select('second_class', DB::raw('count(*) as total'))->limit(1)
        ->orderBy('total', 'desc')->first();
        $this->classes = Classes::with('mentor', 'menteeOnFirstClass', 'menteeOnSecondClass')->get();

        $mostRegistered = 0;
        $totalMostRegistered = 0;

        if ($firstClass->total >= $secondClass->total) {
            $mostRegistered = $firstClass->first_class;
            $totalMostRegistered = $firstClass->total + (Mentee::select('second_class', DB::raw('count(*) as total'))->where('second_class', $firstClass->first_class)->groupBy('second_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        } else if ($secondClass->total >= $firstClass->total) {
            $mostRegistered = $secondClass->second_class;
            $totalMostRegistered = $secondClass->total + (Mentee::select('first_class', DB::raw('count(*) as total'))->where('first_class', $secondClass->second_class)->groupBy('first_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        } else if ($firstClass->first_class == $secondClass->second_class) {
            $mostRegistered = $firstClass->first_class;
            $totalMostRegistered = $firstClass->total + (Mentee::select('second_class', DB::raw('count(*) as total'))->where('second_class', $firstClass->first_class)->groupBy('second_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        } else {
            $mostRegistered = $firstClass->first_class;
            $totalMostRegistered = $firstClass->total + (Mentee::select('second_class', DB::raw('count(*) as total'))->where('second_class', $firstClass->first_class)->groupBy('second_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        }
            
        $trafficRegisterInAWeek = Mentee::select(DB::raw('DATE(created_at) as day'))->orderBy('day')->get()->groupBy('day');
        
        $this->classes = Classes::with('menteeOnFirstClass', 'menteeOnSecondClass')->get();
        
        $menteesUniversity = Mentee::groupBy('university')->select('university', DB::raw('count(*) as total'))->get();
        
        return view('dashboard.MUA.index', [
            'trafficRegisterInAWeek' => $trafficRegisterInAWeek,
            'mostRegisteredOnFirstClass' => Classes::where('classID', $firstClass->first_class)->first()->class_name,
            'mostRegisteredOnSecondClass' => Classes::where('classID', $secondClass->second_class)->first()->class_name,
            'countMostRegisteredOnFirstClass' => $firstClass->total,
            'countMostRegisteredOnSecondClass' => $secondClass->total,
            'mostRegistered' => Classes::where('classID', $mostRegistered)->first(),
            'totalMostRegistered' => $totalMostRegistered,
            'totalMentees' => Mentee::all()->count(),
            'classesOverview' => $this->classes,
            'menteesUniversity' => $menteesUniversity,
            'classes' => $this->classes,
        ]);
    }

    public function mentees()
    {
        $this->mentees = Mentee::with('firstClass', 'secondClass')->orderBy('full_name', 'asc')->orderBy('total_score', 'desc')->get();
        
        $trafficRegisterInAWeek = Mentee::select(DB::raw('DATE(created_at) as day'))->orderBy('day')->get()->groupBy('day');
        
        $this->classes = Classes::with('menteeOnFirstClass', 'menteeOnSecondClass')->get();
        
        $this->classes = Classes::with('menteeOnFirstClass', 'menteeOnSecondClass')->get();
        
        return view('dashboard.MUA.mentee', [
            'mentees' => $this->mentees,
            'totalMentees' => Mentee::all()->count(),
            'classes' => $this->classes,
            'trafficRegisterInAWeek' => $trafficRegisterInAWeek,
            'classesOverview' => $this->classes,
        ]);
    }

    public function mentee($menteeID)
    {
        $this->mentee = Mentee::where('menteeID', '=', $menteeID)->first();
        $trafficRegisterInAWeek = Mentee::select(DB::raw('DATE(created_at) as day'))->orderBy('day')->get()->groupBy('day');
        return view('dashboard.MUA.detail-mentee', [
            'mentee' => $this->mentee,
            'trafficRegisterInAWeek' => $trafficRegisterInAWeek,
        ]);
    }

    public function classes()
    {
        $this->classes = Classes::with('mentor', 'menteeOnFirstClass', 'menteeOnSecondClass')->get();
        $trafficRegisterInAWeek = Mentee::select(DB::raw('DATE(created_at) as day'))->orderBy('day')->get()->groupBy('day');
        $this->mentors = Mentor::with('class')->get();
        $firstClass = Mentee::groupBy('first_class')->select('first_class', DB::raw('count(*) as total'))->limit(1)
        ->orderBy('total', 'desc')->first();
        $secondClass = Mentee::groupBy('second_class')->select('second_class', DB::raw('count(*) as total'))->limit(1)
        ->orderBy('total', 'desc')->first();

        $mostRegistered = 0;
        $totalMostRegistered = 0;

        if ($firstClass->total >= $secondClass->total) {
            $mostRegistered = $firstClass->first_class;
            $totalMostRegistered = $firstClass->total + (Mentee::select('second_class', DB::raw('count(*) as total'))->where('second_class', $firstClass->first_class)->groupBy('second_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        } else if ($secondClass->total >= $firstClass->total) {
            $mostRegistered = $secondClass->second_class;
            $totalMostRegistered = $secondClass->total + (Mentee::select('first_class', DB::raw('count(*) as total'))->where('first_class', $secondClass->second_class)->groupBy('first_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        } else if ($firstClass->first_class == $secondClass->second_class) {
            $mostRegistered = $firstClass->first_class;
            $totalMostRegistered = $firstClass->total + (Mentee::select('second_class', DB::raw('count(*) as total'))->where('second_class', $firstClass->first_class)->groupBy('second_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        } else {
            $mostRegistered = $firstClass->first_class;
            $totalMostRegistered = $firstClass->total + (Mentee::select('second_class', DB::raw('count(*) as total'))->where('second_class', $firstClass->first_class)->groupBy('second_class')->limit(1)
            ->orderBy('total', 'desc')->first()->total ?? 0);
        }

        return view('dashboard.MUA.class', [
            'classes' => $this->classes,
            'mostRegisteredOnFirstClass' => Classes::where('classID', $firstClass->first_class)->first()->class_name,
            'mostRegisteredOnSecondClass' => Classes::where('classID', $secondClass->second_class)->first()->class_name,
            'countMostRegisteredOnFirstClass' => $firstClass->total,
            'countMostRegisteredOnSecondClass' => $secondClass->total,
            'mostRegistered' => Classes::where('classID', $mostRegistered)->first(),
            'totalMostRegistered' => $totalMostRegistered,
            'mentors' => $this->mentors,
            'trafficRegisterInAWeek' => $trafficRegisterInAWeek,
        ]);
    }

    public function class($id, $slug) 
    {
        $this->class = Classes::where('class_slug', $slug)->with('menteeOnFirstClass', 'menteeOnSecondClass')->first();
        $trafficRegisterInAWeek = Mentee::select(DB::raw('DATE(created_at) as day'))->where('first_class', $this->class->classID)->orWhere('second_class', $this->class->classID)->orderBy('day')->get()->groupBy('day');
        $this->mentee = Mentee::where('first_class', $this->class->classID)->with(['assessmentMenteeApplication', 'firstClass', 'secondClass']);
        $arentScored = Mentee::where('first_class', $this->class->classID)->where('total_score', null)->get()->count();
        $scored = Mentee::where('first_class', $this->class->classID)->where('total_score', '<>', null)->get()->count();
        return view('dashboard.MUA.class-detail', [
            'class' => $this->class,
            'mentees' => $this->mentee->orderBy('total_score', 'desc')->get(),
            'topThree' => $this->mentee->limit(3)->orderBy('full_name')->orderBy('total_score', 'desc')->get(),
            'menteeOnFirstClass' => collect(Classes::where('class_slug', $slug)->with('menteeOnFirstClass')->first()->menteeOnFirstClass),
            'menteeOnSecondClass' => collect(Classes::where('class_slug', $slug)->with('menteeOnSecondClass')->first()->menteeOnSecondClass),
            'trafficRegisterInAWeek' => $trafficRegisterInAWeek,
            'arentScored' => $arentScored,
            'scored' => $scored,
            'menteesSecond' => Mentee::where('second_class', $this->class->classID)->with(['assessmentMenteeApplication', 'firstClass', 'secondClass'])->orderBy('total_score', 'desc')->get()
        ]);
    }

    public function mentors() 
    {
        $this->mentors = Mentor::with('class')->get();
        $trafficRegisterInAWeek = Mentee::select(DB::raw('DATE(created_at) as day'))->orderBy('day')->get()->groupBy('day');
        $this->classes = Classes::with('menteeOnFirstClass', 'menteeOnSecondClass')->get();
        return view('dashboard.MUA.mentors', [
            'mentors' => $this->mentors,
            'totalMentees' => Mentee::all()->count(),
            'classes' => $this->classes,
            'trafficRegisterInAWeek' => $trafficRegisterInAWeek,
        ]);
    }

    public function success() {
        return view('MUA.success');
    }

    public function accounts()
    {
        $this->accounts = User::all();
        $trafficRegisterInAWeek = Mentee::select(DB::raw('DATE(created_at) as day'))->orderBy('day')->get()->groupBy('day');
        return view('dashboard.MUA.account', [
            'accounts' => $this->accounts,
            'trafficRegisterInAWeek' => $trafficRegisterInAWeek,
        ]);
    }

    public function login()
    {
        return view('dashboard.MUA.login');
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

    public function logout()
    {
        Session::flush();
        Auth::logout();
        toast("You've Successfully Logged out!", 'success');
        return redirect('/MUAVol9/dashboard/login')->with([
            'logout' => true,
        ]);
    }
}
