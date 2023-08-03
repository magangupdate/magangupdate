<?php

namespace App\Http\Controllers;

use App\Models\Mentee;
use App\Models\Classes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Exports\MenteesExport;
use Maatwebsite\Excel\Facades\Excel;

class MenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validate the input
        $validation = Validator::make($request->all(), [
            'email' => 'required|unique:mentees',
            'full_name' => 'required',
            'university' => 'required',
            'major' => 'required',
            'whatsapp_number' => 'required',
            'instagram' => 'required',
            'first_class' => 'required|in:1,2,3,4,5,6,7,8',
            'reason_first_class' => 'required',
            'second_class' => 'required|different:first_class||in:1,2,3,4,5,6,7,8',
            'reason_second_class' => 'required',
            'cv' => 'required|mimes:pdf|max:10000',
            'twibbon_screenshot' => 'required|mimes:png,jpg,jpeg|max:10000',
            'tag_screenshot' => 'required|mimes:png,jpg,jpeg|max:10000',
            'subscribe_screenshot' => 'required|mimes:png,jpg,jpeg|max:10000',
            'repost_screenshot' => 'required|mimes:png,jpg,jpeg|max:10000',
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
            'q6' => 'required',
            'q7' => 'required',
            'q8' => 'required',
        ]);

        // check validation
        if ($validation->fails()) {
            // dd($validation->messages());
            toast('There are some wrong inputs, check your answer again!', 'error');
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // prepare variables for file input

        $cvFile = $request->file('cv')->store('attachments/cv');
        $repostScreenshootFile = $request->file('repost_screenshot')->store('attachments/repost_screenshoot');
        $twibbonScreenshootFile = $request->file('twibbon_screenshot')->store('attachments/twibbon_screenshoot');
        $tagScreenshootFile = $request->file('tag_screenshot')->store('attachments/tag_screenshoot');
        $subscribeScreenshootFile = $request->file('subscribe_screenshot')->store('attachments/subscribe_screenshoot');

        try {
            Mentee::create([
                'email' => $request->email,
                'full_name' => $request->full_name,
                'university' => $request->university,
                'major' => $request->major,
                'whatsapp_number' => $request->whatsapp_number,
                'instagram' => $request->instagram,
                'first_class' => $request->first_class,
                'reason_first_class' => $request->reason_first_class,
                'second_class' => $request->second_class,
                'reason_second_class' => $request->reason_second_class,
                'cv' => $cvFile,
                'twibbon_screenshot' => $twibbonScreenshootFile,
                'repost_screenshot' => $repostScreenshootFile,
                'tag_screenshot' => $tagScreenshootFile,
                'subscribe_screenshot' => $subscribeScreenshootFile,
                'q1' => $request->q1,
                'q2' => $request->q2,
                'q3' => $request->q3,
                'q4' => $request->q4,
                'q5' => $request->q5,
                'q6' => $request->q6,
                'q7' => $request->q7,
                'q8' => $request->q8,
            ]);
        } catch (Exception $e) {
            toast('There are Internal Server Error, Please Contact Our CP!', 'error');
            return redirect()
                ->back()
                ->with(['error' => 'Mentee gagal registrasi!']);
        }

        Session::put('success-register', 'successfully');

        toast('You registered to MUA Vol. 9 successfully!', 'success');
        return redirect()
            ->route('mua.mentees.success')
            ->with(['success' => 'Mentee berhasil registrasi!']);
    }
    
    public function export($id, $classID) 
    {
        $className = Classes::where('classID', $classID)->select('class_name')->first()->class_name;
        if($className === 'UI/UX Design') {
            return Excel::download(new MenteesExport($classID), "UI-UX Design" . '.xlsx');
        }
        
        return Excel::download(new MenteesExport($classID), $className . '.xlsx');
    }
    
    public function exportPerClass($id, $classID)
    {
        return Excel::download(new MenteesExport($classID), 'mentees-' . $classID . '.xlsx');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
