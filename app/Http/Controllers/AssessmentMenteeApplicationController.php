<?php

namespace App\Http\Controllers;

use App\Models\AssessmentMenteeApplication;
use App\Models\Mentee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssessmentMenteeApplicationController extends Controller
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
            'assessment0' => 'required',
            'assessment01' => 'required',
            'assessment02' => 'required',
            'assessment1' => 'required',
            'assessment2' => 'required',
            'assessment3' => 'required',
            'assessment4' => 'required',
            'assessment5' => 'required',
            'assessment6' => 'required',
            'assessment7' => 'required',
            'assessment8' => 'required',
            'assessment9' => 'required',
            'assessment10' => 'required',
            'assessment11' => 'required',
            'assessment12' => 'required',
        ]);

        // check validation
        if ($validation->fails()) {
            toast('Assessment is failed to this mentee.<br>Try Again, Because there are some<br>inputs not filled!', 'error');
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        $totalScoreAssessment = $request->assessment0 + $request->assessment02 + $request->assessment1 + $request->assessment2 + $request->assessment3 + $request->assessment4 + $request->assessment5 + $request->assessment6 + $request->assessment7 + $request->assessment8 + $request->assessment9 + $request->assessment10 + $request->assessment11 + $request->assessment12;

        try {
            AssessmentMenteeApplication::create([
                'menteeID' => $request->menteeID,
                'assessment0' => $request->assessment0,
                'assessment01' => $request->assessment01,
                'assessment02' => $request->assessment02,
                'assessment1' => $request->assessment1,
                'assessment2' => $request->assessment2,
                'assessment3' => $request->assessment3,
                'assessment4' => $request->assessment4,
                'assessment5' => $request->assessment5,
                'assessment6' => $request->assessment6,
                'assessment7' => $request->assessment7,
                'assessment8' => $request->assessment8,
                'assessment9' => $request->assessment9,
                'assessment10' => $request->assessment10,
                'assessment11' => $request->assessment11,
                'assessment12' => $request->assessment12,
            ]);

            Mentee::where('menteeID', $request->menteeID)->update(['total_score' => $totalScoreAssessment]);
        } catch (Exception $e) {
            toast(
                "Internal server error.\nYour assessment fail to updated",
                'error'
            );
            dd($e);
            return redirect()
                ->back()
                ->with(['error' => 'Mentee gagal diseleksi!']);
        }

        toast('Your asseesment is success to this mentee!', 'success');
        return redirect()
            ->back()
            ->with(['success' => 'Mentee berhasil diseleksi!']);
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
    public function update(Request $request)
    {
        // validate the input
        $validation = Validator::make($request->all(), [
            'assessment0' => 'required',
            'assessment01' => 'required',
            'assessment02' => 'required',
            'assessment1' => 'required',
            'assessment2' => 'required',
            'assessment3' => 'required',
            'assessment4' => 'required',
            'assessment5' => 'required',
            'assessment6' => 'required',
            'assessment7' => 'required',
            'assessment8' => 'required',
            'assessment9' => 'required',
            'assessment10' => 'required',
            'assessment11' => 'required',
            'assessment12' => 'required',
        ]);

        // check validation
        if ($validation->fails()) {
            toast('Assessment is failed to this mentee.<br>Try Again, Because there are some<br>inputs you deleted or missing!', 'error');
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        $totalScoreAssessment = $request->assessment0 + $request->assessment02 + $request->assessment1 + $request->assessment2 + $request->assessment3 + $request->assessment4 + $request->assessment5 + $request->assessment6 + $request->assessment7 + $request->assessment8 + $request->assessment9 + $request->assessment10 + $request->assessment11 + $request->assessment12;

        try {
            AssessmentMenteeApplication::where('menteeID', $request->menteeID)->update([
                'menteeID' => $request->menteeID,
                'assessment0' => $request->assessment0,
                'assessment01' => $request->assessment01,
                'assessment02' => $request->assessment02,
                'assessment1' => $request->assessment1,
                'assessment2' => $request->assessment2,
                'assessment3' => $request->assessment3,
                'assessment4' => $request->assessment4,
                'assessment5' => $request->assessment5,
                'assessment6' => $request->assessment6,
                'assessment7' => $request->assessment7,
                'assessment8' => $request->assessment8,
                'assessment9' => $request->assessment9,
                'assessment10' => $request->assessment10,
                'assessment11' => $request->assessment11,
                'assessment12' => $request->assessment12,
            ]);

            Mentee::where('menteeID', $request->menteeID)->update(['total_score' => $totalScoreAssessment]);
        } catch (Exception $e) {
            toast(
                "Internal server error.\nYour assessment fail to updated",
                'error'
            );
            dd($e);
            return redirect()
                ->back()
                ->with(['error' => 'Mentee gagal diseleksi!']);
        }

        toast('Your asseesment successfully edited to this mentee!', 'success');
        return redirect()
            ->back()
            ->with(['success' => 'Mentee berhasil diseleksi!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
