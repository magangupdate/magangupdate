<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MentorController extends Controller
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
            'mentor_name' => 'required',
            'mentor_job' => 'required',
            'mentor_picture' => 'required',
        ]);

        // check validation
        if ($validation->fails()) {
            toast(
                "Error input.\nMentor fail to added",
                'error'
            );
            dd($validation->messages());
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // prepare variables for file input

        try {
            Mentor::create([
                'classID' => $request->classID,
                'mentor_name' => $request->mentor_name,
                'mentor_job' => $request->mentor_job,
                'mentor_description' => $request->mentor_description,
                'mentor_picture' => $request->mentor_picture,
                'volume' => $request->volume,
            ]);
        } catch (Exception $e) {
            toast(
                "Internal server error.\nYour assessment fail to updated",
                'error'
            );
            dd($e);
            return redirect()
                ->route('dashboard.mua.mentors')
                ->with(['error' => 'Mentor failed to added!']);
        }

        toast('New Mentor successfully added!', 'success');
        return redirect()
            ->route('dashboard.mua.mentors')
            ->with(['success' => 'New Mentor successfully added!']);
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
        // get id article
        $id = $request->id;

        // get article with id
        $mentor = Mentor::where('id', '=', $id)->first();

        // validate all input
        $validation = Validator::make($request->all(), [
            'mentor_name' => 'required',
            'mentor_job' => 'required',
            'volume' => 'required',
            'mentor_picture' => 'required',
            'classID' => 'required',
        ]);

        // check validation
        if ($validation->fails()) {
            toast('Mentor is failed to updated because there is error input!', 'error');
            dd($validation->messages());
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // check thumbnail old or not
        $pictureFile = '';

        // check if there is no input file with name thumbnail
        if ($request->file('mentor_picture') !== null) {
            $pictureFile = $request->file('mentor_picture')->store('mentors');
            Storage::delete($mentor->mentor_picture);
        } else {
            $pictureFile = $mentor->mentor_picture;
        }

        
        try {
            Mentor::where('id', $id)->update([
                'mentor_name' => $request->mentor_name,
                'mentor_job' => $request->mentor_job,
                'volume' => $request->volume,
                'mentor_picture' => $pictureFile,
                'mentor_description' => $request->mentor_description,
                'classID' => $request->classID,
            ]);
        } catch (Exception $e) {
            toast(
                "Internal server error.\nMentor fail to updated",
                'error'
            );
            return redirect()
            ->route('dashboard.mua.mentors')
            ->with(['success' => 'Mentor fail to updated!']);
        }

        toast('Mentor successfully updated.', 'success');
        return redirect()
            ->route('dashboard.mua.mentors')
            ->with(['success' => 'Mentor successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $mentor = Mentor::where('id', '=', $id);
        $picture = Mentor::where('id', '=', $id)->first()->mentor_picture;

        try {
            Storage::delete($picture);
            $mentor->delete();
        } catch (Exception $e) {
            dd($e);
            toast(
                "Internal server error.\nData mentor fail to deleted",
                'error'
            );
            return redirect()
                ->route('dashboard.mua.mentors')
                ->with(['error' => 'Data mentor fail to deleted!']);
        }
        toast('Mentor successfully deleted.', 'success');
        return redirect()
            ->route('dashboard.mua.mentors')
            ->with(['success' => 'Mentor successfully deleted!']);
    }
}
